@component('mail::message')
# Custom Order Confirmation

Dear {{ $order->name }},

Thank you for your custom order at McRifle. We have received your request and will process it shortly.

## Order Details

**Order Reference:** {{ $order->reference_number }}  
**Date:** {{ $order->created_at->format('F j, Y') }}

### Specifications
- **Type:** {{ $order->type }}
- **Caliber:** {{ $order->caliber }}
- **Barrel Length:** {{ $order->barrel_length }} inches
- **Stock Type:** {{ $order->stock_type }}
- **Finish:** {{ $order->finish }}
- **Additional Features:** {{ $order->additional_features }}

### Contact Information
- **Email:** {{ $order->email }}
- **Phone:** {{ $order->phone }}
- **Address:** {{ $order->address }}

## Next Steps
1. Our team will review your specifications
2. We'll contact you within 2 business days to discuss the details
3. Once approved, we'll provide you with a timeline for completion

If you have any questions or need to make changes to your order, please contact us at support@mcrifle.com or call us at (555) 123-4567.

@component('mail::button', ['url' => config('app.url')])
Visit Our Website
@endcomponent

Thank you for choosing McRifle for your custom firearm needs.

Best regards,<br>
The McRifle Team
@endcomponent 