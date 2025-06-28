@extends('layouts.main')

@section('title', 'Tentang Kami - McRifle')

@section('content')
<div class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-8">
                    <h1 class="text-3xl font-bold text-center mb-8">Tentang McRifle</h1>
                    
                    <div class="prose max-w-none">
                        <p class="mb-6">
                            McRifle adalah perusahaan terkemuka yang berfokus pada penyediaan senjata api premium dan aksesori berkualitas tinggi untuk para penggemar dan profesional. Didirikan pada tahun 2010, kami telah membangun reputasi yang solid dalam industri ini dengan menawarkan produk-produk terbaik dengan standar kualitas yang tidak kompromi.
                        </p>
                        
                        <h2 class="text-2xl font-semibold mt-8 mb-4">Visi Kami</h2>
                        <p class="mb-6">
                            Visi kami adalah menjadi pemimpin dalam industri senjata api dengan menyediakan produk berkualitas tinggi dan layanan yang sempurna, sambil tetap menjunjung tinggi nilai-nilai keamanan, tanggung jawab, dan kepatuhan terhadap peraturan.
                        </p>
                        
                        <h2 class="text-2xl font-semibold mt-8 mb-4">Misi Kami</h2>
                        <p class="mb-6">
                            Misi kami adalah:
                        </p>
                        <ul class="list-disc pl-6 mb-6">
                            <li>Menyediakan produk senjata api dan aksesori berkualitas tertinggi</li>
                            <li>Memberikan pengalaman belanja yang aman dan nyaman</li>
                            <li>Mendidik tentang penggunaan senjata yang aman dan bertanggung jawab</li>
                            <li>Mendukung hak-hak kepemilikan senjata yang bertanggung jawab</li>
                            <li>Berkontribusi positif kepada komunitas melalui berbagai inisiatif</li>
                        </ul>
                        
                        <h2 class="text-2xl font-semibold mt-8 mb-4">Keunggulan Kami</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div class="border rounded-lg p-4">
                                <h3 class="text-xl font-medium mb-2">Kualitas Premium</h3>
                                <p>Semua produk kami melewati proses seleksi ketat untuk memastikan kualitas terbaik.</p>
                            </div>
                            <div class="border rounded-lg p-4">
                                <h3 class="text-xl font-medium mb-2">Kepatuhan Hukum</h3>
                                <p>Kami selalu mematuhi semua peraturan dan regulasi senjata api yang berlaku.</p>
                            </div>
                            <div class="border rounded-lg p-4">
                                <h3 class="text-xl font-medium mb-2">Layanan Kustomisasi</h3>
                                <p>Layanan kustomisasi kami memungkinkan Anda membuat senjata sesuai preferensi Anda.</p>
                            </div>
                            <div class="border rounded-lg p-4">
                                <h3 class="text-xl font-medium mb-2">Dukungan Pelanggan</h3>
                                <p>Tim dukungan kami siap membantu dengan segala pertanyaan dan kebutuhan Anda.</p>
                            </div>
                        </div>
                        
                        <h2 class="text-2xl font-semibold mt-8 mb-4">Tim Kami</h2>
                        <p class="mb-6">
                            Tim kami terdiri dari para profesional berpengalaman yang memiliki pengetahuan mendalam tentang industri senjata api. Dari mantan personel militer hingga penembak kompetitif, keahlian kolektif tim kami memastikan bahwa Anda mendapatkan produk dan saran terbaik.
                        </p>
                        
                        <div class="mt-8 text-center">
                            <p class="font-medium">
                                Untuk informasi lebih lanjut, jangan ragu untuk menghubungi kami melalui halaman <a href="{{ route('contact') }}" class="text-brown-600 hover:text-brown-700">Kontak</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 