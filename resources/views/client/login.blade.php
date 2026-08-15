<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    <script src="{{ asset('assets/jquery.js') }}"></script>
    <script src="{{asset('assets/tailwind.js')}}"></script>

    <title>ورود |  آموزش زبان</title>
   <style>
    input {
        transition: all 0.3s ease;
        color: #374151 !important;
    }
    input::placeholder {
        color: #9ca3af !important; 
        opacity: 1;
    }
    
    /* حالت focus */
    input:focus {
        border-color: #8b5cf6 !important;
        box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1) !important;
        color: #8b5cf6 !important;
        outline: none !important;
    }
    
   
    input:focus::placeholder {
        color: #c4b5fd !important; 
        opacity: 0.8;
    }
    
   
    input:focus + span svg,
    .group:focus-within span svg {
        color: #8b5cf6 !important;
    }
    
    input:-webkit-autofill,
    input:-webkit-autofill:hover, 
    input:-webkit-autofill:focus, 
    input:-webkit-autofill:active {
        -webkit-background-clip: text;
        -webkit-text-fill-color: #374151 !important;
        transition: background-color 5000s ease-in-out 0s;
        box-shadow: inset 0 0 20px 20px #f5f3ff !important;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fadeIn {
        animation: fadeIn 0.8s ease-out;
    }
    
    .bg-purple-gradient {
        background: linear-gradient(135deg, #a78bfa 0%, #8b5cf6 50%, #7c3aed 100%);
    }
    
    .btn-purple {
        background: linear-gradient(to left, #8b5cf6, #a78bfa);
        transition: all 0.3s ease;
    }
    
    .btn-purple:hover {
        background: linear-gradient(to left, #7c3aed, #8b5cf6);
        transform: translateY(-2px);
        box-shadow: 0 10px 20px -5px rgba(139, 92, 246, 0.3);
    }
    
    .footer-purple {
        background: linear-gradient(to right, #8b5cf6, #a78bfa, #8b5cf6);
    }
</style>
</head>

<body class="bg-gradient-to-br from-purple-50 to-white">

    <div class="w-full flex flex-col justify-start items-center md:flex-row-reverse">
    
        <div class="flex justify-center max-sm:h-30 max-md:h-35 md:h-dvh bg-purple-gradient relative overflow-hidden w-full lg:w-1/2">
           
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-10 left-10 w-40 h-40 bg-white rounded-full blur-3xl"></div>
                <div class="absolute bottom-10 right-10 w-60 h-60 bg-purple-300 rounded-full blur-3xl"></div>
            </div>
            
            <div class="flex flex-col my-12 items-center justify-center relative z-10 w-full">
                <div class="w-full flex flex-row justify-center items-center animate-fadeIn">
                    {{-- <img class="max-md:w-4/12 w-8/12" src="{{ asset('assets/img/e125edbd-f303-47f3-9dbc-af414f99ccb2.webp') }}" alt=""> --}}
                    <div class="text-center">
                        <h2 class="text-center font-bold text-white text-5xl mb-2 drop-shadow-lg">rintalk</h2>
                        <div class="w-20 h-1 bg-white mx-auto rounded-full"></div>
                        <p class="text-white/80 text-sm mt-2"> آموزش زبان</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- بخش فرم ورود -->
        <div class="w-full md:w-8/12 bg-white h-full flex flex-col max-md:justify-start justify-center mt-5 items-center px-4 lg:w-1/2">
            <div class="w-full flex flex-col items-center justify-center md:justify-center lg:w-115 md:w-10/12 px-4 animate-fadeIn">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">ورود به حساب کاربری</h1>
                <p class="text-gray-500 text-sm mb-8">برای ورود اطلاعات خود را وارد کنید</p>
                
                <div class="flex flex-col w-full">
                    <form action="{{ route('user.check') }}" class="flex flex-col items-center my-2 gap-4 w-full"
                        id="loginForm"
                        method="post">
                        @csrf
                        
                        <!-- فیلد شماره تلفن -->
                        {{-- <div class="relative w-full group">
                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-purple-500 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </span>
                            <input type="text"
                                class="w-full pr-10 pl-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-0 focus:outline-none transition-all duration-300 hover:border-purple-200 bg-gray-50/50"
                                name="phoneNumber" 
                                placeholder="شماره تلفن"
                                dir="ltr">
                        </div> --}}
                            <div class="relative w-full group @error('phoneNumber') mb-5 @enderror">
                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-purple-500 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </span>
                            <input type="text"
                                class="w-full pr-10 pl-4 py-3 rounded-xl border-2 @error('phoneNumber') border-red-500 @enderror border-gray-200 focus:border-purple-500 focus:ring-0 focus:outline-none transition-all duration-300 hover:border-purple-200 bg-gray-50/50"
                                name="phoneNumber" 
                                id="phoneNumber"
                                placeholder="شماره تلفن" value="{{ old('phoneNumber') }}" required>
                            @error('phoneNumber')
                              <span class="text-red-500 text-sm absolute bg-white right-3 -bottom-6">{{ $message }}</span>  
                            @enderror
                        </div>
                        
                        <!-- فیلد کلمه عبور -->
                        <div class="relative w-full group @error('password') mb-5 @enderror">
                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-purple-500 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </span>
                            <input type="password"
                                class="w-full pr-10 pl-4 py-3 rounded-xl border-2 @error('password') border-red-500 @enderror border-gray-200 focus:border-purple-500 focus:ring-0 focus:outline-none transition-all duration-300 hover:border-purple-200 bg-gray-50/50"
                                name="password" 
                                id="password"
                                placeholder="کلمه عبور">
                            @error('password')
                              <span class="text-red-500 text-sm absolute bg-white right-3 -bottom-6">{{ $message }}</span>  
                            @enderror
                        </div>
                        
                        <!-- گزینه‌های اضافی -->
                        <div class="w-full flex items-center justify-between mt-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-purple-500 focus:ring-purple-300">
                                <span class="text-sm text-gray-600">مرا به خاطر بسپار</span>
                            </label>
                            {{-- <a href="#" class="text-sm text-purple-500 hover:text-purple-600 transition-colors font-medium">فراموشی رمز عبور؟</a> --}}
                        </div>
                        
                        <!-- دکمه ورود -->
                        <button type="submit"
                            class="btn-purple w-full text-center text-white p-3.5 rounded-xl font-medium text-lg mt-4 cursor-pointer shadow-lg shadow-purple-200" onclick="loginToAccount(event)">
                            ورود به حساب
                        </button>
                        
                        <!-- لینک ثبت نام -->
                        <div class="w-full text-center mt-4">
                            <span class="text-gray-600">
                                حساب کاربری ندارید؟
                                <a href="{{ route('signup') }}" class="text-purple-500 font-semibold hover:text-purple-600 transition-colors mr-1">
                                    ثبت نام کنید!
                                </a>
                            </span>
                        </div>
                    </form>
                </div>
                
             
                
            </div>
        </div>
    </div>
    
    <!-- فوتر موبایل -->
   <footer class="md:hidden">
        <div class="footer-purple w-full h-12 absolute bottom-0 flex flex-row gap-4 justify-center items-center text-white shadow-lg">
            <div class="flex items-center gap-2">
                <span class="text-sm">آکادمی فائوس</span>
            </div>
            <a href="tel:09147794595" class="text-sm hover:underline flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                <b>09147794595</b>
            </a>
        </div>
    </footer>

    <!-- فوتر دسکتاپ (اختیاری) -->
    <div class="hidden md:block fixed bottom-4 right-4">
        <a href="tel:09147794595" class="flex items-center gap-2 bg-white px-4 py-2 rounded-full shadow-lg hover:shadow-xl transition-shadow border border-purple-100">
            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
            </div>
            <span class="text-gray-700 font-medium">09147794595</span>
        </a>
    </div>
    <script>
        let loginForm = document.getElementById('loginForm')
        let phoneNumber = document.getElementById('phoneNumber')
        let password = document.getElementById('password')
        function loginToAccount(e){
            e.preventDefault()
            if(phoneNumber.value == '' || password.value == ''){
                alert('پر کردن همه فیلد ها الزامی است')
            } else {
                loginForm.submit()
            }
        }
    </script>
</body>

</html>