@extends('welcome')
@section('title', 'لیست  درخواست های من')
@section('content')
<script src="{{ asset('assets/js/jquery.js') }}"></script>

    <div class="w-full flex flex-col pb-4">
        <div class="bg-white rounded-lg">

            <h2 class="text-lg font-bold text-gray-800 p-4 text-center">لیست  درخواست های من</h2>

            <div class="w-11/12 mx-auto shadow-md rounded mb-5 overflow-x-auto [&::-webkit-scrollbar]:hidden lg:overflow-visible">
                <div
                    class="w-full flex flex-row lg:grid lg:grid-cols-3 items-center divide-x divide-[#f1f1f4] sticky -top-5">
                    <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                        <span class="block w-10 lg:w-full">ردیف</span>
                    </div>
                    <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-1">
                        <span class="block w-30 lg:w-full">نام</span>
                    </div>
                    <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                        <span class="block w-24 lg:w-full">عملیات</span>
                    </div>
                </div>
                <div class="bg-white divide-y divide-[#f1f1f4]">
                    @php
                        $i = 1;
                    @endphp
                    @if (isset($requests))
                        @foreach ($requests as $user)
                            <div
                                class="w-full flex flex-row lg:grid lg:grid-cols-3 items-center divide-x divide-[#f1f1f4]">
                                
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                    <span class="block w-10 lg:w-full">{{ $i }}</span>
                                </div>
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-1">
                                    <span class="block w-30 lg:w-full">{{ $user->name }}</span>
                                </div>
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900">
                                    <div class="w-24 lg:w-full flex justify-center">
                                        @if(isset($status->applicant))
                                        @if($status->status == 1)
                                        <div class="confirm-btn w-fit flex flex-row items-center justify-center bg-gray-500 p-1 px-3 rounded-sm cursor-pointer">
                                            تایید شده
                                        </div>
                                        @endif
                                        @else
                                        <button onclick="accept(this, {{ $user->id }})" class="confirm-btn w-fit flex flex-row items-center justify-center bg-green-500  p-1 px-3 rounded-sm cursor-pointer">
                                            تایید
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    @else
                        <div>
                            <div class="px-1 lg:px-6 py-4 text-center text-xs lg:text-sm text-gray-500">
                                هیچ اطلاعاتی یافت نشد
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        let clicked = false;
        let partnerCount = {{ $partnerCount ?? 0 }};
        
        function accept(btn, userId) {
            if(clicked) {
                alert('شما فقط میتوانید یک کاربر را تایید کنید!');
                return;
            }
            
            if(partnerCount >= 2) {
                alert('شما فقط میتوانید 2 کاربر را تایید کنید!');
                return;
            }
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });    
            $.ajax({
                url: "{{ route('course.acceptRequest') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'user_id': userId
                },
                success: function(data) {
                    console.log(data)
                    if(data.success) {
                        btn.innerText = 'تایید شده';
                        btn.classList.remove('bg-green-500');
                        btn.classList.add('bg-gray-400');
                        btn.disabled = true;
                        clicked = true;
                        approvedCount++;
                         alert('کاربر با موفقیت تایید شد');
                    } else {
                        btn.innerText = 'تایید';
                         alert(data.message || 'خطا در تایید کاربر');
                        
                    }
                },
                error: function() {
                    btn.innerText = 'تایید';
                    alert('خطا در ارتباط با سرور');
                }
            });
        }
    </script>
@endsection