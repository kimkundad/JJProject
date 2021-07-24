แจ้งการชำระเงิน หมายเลขรายการสั่งซื้อ #{{$details['no_pay']}}<br>
ชื่อผู้ติดต่อ : {{$details['name_pay']}}<br>
เบอร์โทรติดต่อ : {{$details['phone_pay']}}<br>
อีเมล : {{$details['email_pay']}}<br>
หมายเลขรายการสั่งซื้อ : {{$details['no_pay']}}<br>
ยอดโอน : {{$details['money_pay']}}<br>
ธนาคารที่โอน  : {{$details['bank']}}<br>
วันที่โอน : {{$details['day_pay']}}<br>
เวลา : {{$details['time_pay']}}<br>
หลักฐานการโอน (ถ้ามี)
<br>
@if($details['files_pay'] != null)
<img src="{{url('assets/image/payment/'.$details['files_pay'])}}">
@endif
<br>
หมายเหตุ : {{$details['message_pay']}}