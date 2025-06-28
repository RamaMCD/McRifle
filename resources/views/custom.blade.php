@extends('layouts.main')

@section('title', 'Custom Order - McRifle')

@section('content')
<div class="bg-gray-100 py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-3xl font-bold text-center mb-8">Custom Order</h1>

            <!-- Progress Steps -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-brown-700 text-white flex items-center justify-center step-1 border-4 border-brown-300">1</div>
                        <div class="ml-2 text-base font-semibold text-brown-800">Basic Info</div>
                    </div>
                    <div class="flex-1 h-1 bg-brown-200 mx-4"></div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center step-2 border-4 border-brown-200">2</div>
                        <div class="ml-2 text-base font-semibold text-brown-800">Specifications</div>
                    </div>
                    <div class="flex-1 h-1 bg-brown-200 mx-4"></div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center step-3 border-4 border-brown-200">3</div>
                        <div class="ml-2 text-base font-semibold text-brown-800">Review</div>
                    </div>
                </div>
            </div>

            <!-- Step 1: Basic Information -->
            <form action="{{ route('custom.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="bg-white rounded-lg shadow-md p-8" id="step1">
                    <h2 class="text-xl font-semibold mb-6">Basic Information</h2>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brown-500 focus:ring-brown-500">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" 
                               name="email" 
                               id="email" 
                               required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brown-500 focus:ring-brown-500">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="tel" 
                               name="phone" 
                               id="phone" 
                               required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brown-500 focus:ring-brown-500">
                    </div>

                    <div>
                        <label for="base_model" class="block text-sm font-medium text-gray-700">Base Model</label>
                        <select name="base_model" 
                                id="base_model" 
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brown-500 focus:ring-brown-500">
                            <option value="">Select a base model</option>
                            <option value="rifle">Rifle</option>
                            <option value="handgun">Handgun</option>
                            <option value="shotgun">Shotgun</option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" 
                                id="next-step-1"
                                class="px-6 py-3 bg-brown-600 text-white rounded-lg hover:bg-brown-700 transition duration-150">
                            Next Step
                        </button>
                    </div>
                </div>

                <!-- Step 2: Specifications -->
                <div class="bg-white rounded-lg shadow-md p-8 hidden" id="step2">
                    <h2 class="text-xl font-semibold mb-6">Specifications</h2>
                    <div class="space-y-6">
                        <div>
                            <label for="caliber" class="block text-sm font-medium text-gray-700">Caliber</label>
                            <select name="caliber" 
                                    id="caliber" 
                                    required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brown-500 focus:ring-brown-500">
                                <option value="">Select caliber</option>
                                <option value="9mm">9mm</option>
                                <option value="45acp">.45 ACP</option>
                                <option value="223">.223 Remington</option>
                                <option value="308">.308 Winchester</option>
                            </select>
                        </div>

                        <div>
                            <label for="barrel_length" class="block text-sm font-medium text-gray-700">Barrel Length (inches)</label>
                            <input type="number" 
                                   name="barrel_length" 
                                   id="barrel_length" 
                                   min="4" 
                                   max="24"
                                   required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brown-500 focus:ring-brown-500">
                        </div>

                        <div>
                            <label for="finish" class="block text-sm font-medium text-gray-700">Finish</label>
                            <select name="finish" 
                                    id="finish" 
                                    required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brown-500 focus:ring-brown-500">
                                <option value="">Select finish</option>
                                <option value="blued">Blued</option>
                                <option value="stainless">Stainless Steel</option>
                                <option value="cerakote">Cerakote</option>
                            </select>
                        </div>

                        <div>
                            <label for="additional_features" class="block text-sm font-medium text-gray-700">Additional Features</label>
                            <textarea name="additional_features" 
                                      id="additional_features" 
                                      rows="4"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brown-500 focus:ring-brown-500"
                                      placeholder="Describe any additional features or modifications you'd like..."></textarea>
                        </div>

                        <div class="flex justify-between">
                            <button type="button" 
                                    onclick="prevStep(2)"
                                    class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-150">
                                Previous Step
                            </button>
                            <button type="button" 
                                    onclick="nextStep(2)"
                                    class="px-6 py-3 bg-brown-600 text-white rounded-lg hover:bg-brown-700 transition duration-150">
                                Next Step
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Review -->
                <div class="bg-white rounded-lg shadow-md p-8 hidden" id="step3">
                    <h2 class="text-xl font-semibold mb-6">Review Your Order</h2>
                    <div id="success-alert" class="hidden mb-4 p-4 rounded-lg bg-green-100 border border-green-400 text-green-800 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Email konfirmasi custom order telah dikirim ke email Anda!
                    </div>
                    <div class="space-y-6">
                        <div class="border rounded-lg p-4">
                            <h3 class="font-medium mb-4">Order Summary</h3>
                            <dl class="space-y-2">
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Base Model:</dt>
                                    <dd class="font-medium" id="review-base-model"></dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Caliber:</dt>
                                    <dd class="font-medium" id="review-caliber"></dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Barrel Length:</dt>
                                    <dd class="font-medium" id="review-barrel-length"></dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Finish:</dt>
                                    <dd class="font-medium" id="review-finish"></dd>
                                </div>
                            </dl>
                        </div>

                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700">Additional Notes</label>
                            <textarea name="notes" 
                                      id="notes" 
                                      rows="4"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brown-500 focus:ring-brown-500"
                                      placeholder="Any additional notes or special requests..."></textarea>
                        </div>

                        <div class="flex justify-between">
                            <button type="button" 
                                    onclick="prevStep(3)"
                                    class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-150">
                                Previous Step
                            </button>
                            <button type="submit" 
                                    class="px-6 py-3 bg-brown-600 text-white rounded-lg hover:bg-brown-700 transition duration-150">
                                Submit Order
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Next Step 1 manual validation
        document.getElementById('next-step-1').addEventListener('click', function(e) {
            let valid = true;
            ['name','email','phone','base_model'].forEach(function(id) {
                const el = document.getElementById(id);
                if (!el.value) {
                    el.classList.add('border-red-500');
                    valid = false;
                } else {
                    el.classList.remove('border-red-500');
                }
            });
            if (valid) {
                nextStep(1);
            }
        });
        @if(session('success'))
            document.getElementById('success-alert').classList.remove('hidden');
        @endif
    });
    function nextStep(currentStep) {
        document.getElementById(`step${currentStep}`).classList.add('hidden');
        document.getElementById(`step${currentStep + 1}`).classList.remove('hidden');
        updateProgress(currentStep + 1);
        if (currentStep === 2) {
            updateReview();
        }
    }
    function prevStep(currentStep) {
        document.getElementById(`step${currentStep}`).classList.add('hidden');
        document.getElementById(`step${currentStep - 1}`).classList.remove('hidden');
        updateProgress(currentStep - 1);
    }
    function updateProgress(step) {
        for (let i = 1; i <= 3; i++) {
            const stepNumber = document.querySelector(`.step-${i}`);
            if (i < step) {
                stepNumber.classList.remove('bg-gray-300', 'text-gray-600');
                stepNumber.classList.add('bg-brown-700', 'text-white', 'border-brown-400');
            } else if (i === step) {
                stepNumber.classList.remove('bg-gray-300', 'text-gray-600');
                stepNumber.classList.add('bg-brown-700', 'text-white', 'border-brown-700');
            } else {
                stepNumber.classList.remove('bg-brown-700', 'text-white', 'border-brown-700', 'border-brown-400');
                stepNumber.classList.add('bg-gray-300', 'text-gray-600', 'border-brown-200');
            }
        }
    }
    function updateReview() {
        document.getElementById('review-base-model').textContent = document.getElementById('base_model').value;
        document.getElementById('review-caliber').textContent = document.getElementById('caliber').value;
        document.getElementById('review-barrel-length').textContent = document.getElementById('barrel_length').value + ' inches';
        document.getElementById('review-finish').textContent = document.getElementById('finish').value;
    }
</script>
@endsection 