@extends('welcome')
@section('title', 'لیست کاربران دوره')
@section('content')
<script src="{{ asset('assets/js/jquery.js') }}"></script>

    <div class="w-full flex flex-col pb-4">
        <div class="bg-white rounded-lg">

            <h2 class="text-lg font-bold text-gray-800 p-4 text-center">لیست کاربران دوره</h2>

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
                    @if ($courseUsers && count($courseUsers) > 0)
                        @foreach ($courseUsers as $user)
                            @if($authUser->id != $user->id)
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
                                        @if(isset($status) && $status->applicant == $user->id)
                                            <div class="w-fit flex flex-row items-center justify-center bg-gray-500 p-1 px-3 rounded-sm cursor-pointer">
                                                درخواست تایید شده
                                            </div>
                                        @elseif(isset($sentRequests) && in_array($user->id, $sentRequests))
                                            <div class="w-fit flex flex-row items-center justify-center bg-gray-400 p-1 px-3 rounded-sm">
                                                درخواست ارسال شده
                                            </div>
                                        @else
                                            <button onclick="sendRequest(this, {{ $user->id }})" class="request-btn w-fit flex flex-row items-center justify-center bg-blue-500 hover:bg-blue-600 p-1 px-3 rounded-sm cursor-pointer">
                                                ارسال درخواست
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @php
                                $i++;
                            @endphp
                            @endif
                        @endforeach
                    @else
                        <div>
                            <div class="px-1 lg:px-6 py-8 text-center text-xs lg:text-sm text-gray-500">
                                <span class="block"> این دوره فعلاً شرکت‌کننده‌ای ندارد</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        let requestCount = {{ $sentRequestsCount ?? 0 }};
        
        function sendRequest(btn, userId) {
            if(requestCount >= 2) {
                alert('شما فقط میتوانید به 2 کاربر درخواست ارسال کنید!');
                return;
            }
            
            if(btn.disabled) {
                alert('شما قبلاً به این کاربر درخواست ارسال کرده‌اید!');
                return;
            }
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });    
            $.ajax({
                url: "{{ route('course.sendRequestToPartner') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'user_id': userId
                },
                success: function(data) {
                    console.log(data)
                    if(data.success) {
                        btn.innerText = 'درخواست ارسال شد';
                        btn.classList.remove('bg-blue-500', 'hover:bg-blue-600');
                        btn.classList.add('bg-gray-400');
                        btn.disabled = true;
                        requestCount++;
                        alert('درخواست با موفقیت ارسال شد');
                    } else {
                        btn.innerText = 'ارسال درخواست';
                        alert(data.message || 'خطا در ارسال درخواست');
                    }
                },
                error: function() {
                    btn.innerText = 'ارسال درخواست';
                    alert('خطا در ارتباط با سرور');
                }
            });
        }
    </script>
@endsection