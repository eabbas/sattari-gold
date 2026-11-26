@extends('app.document')
@section('title')
    طلای ستاری | درباره ما
@endsection
@section('content')

  <style>
    * {
      font-family: 'Vazirmatn', sans-serif;
    }

    body {
      background: #fcf5ec;
      color: #422d1a;
      overflow-x: hidden;
    }

    .gold {
      color: #bd843c;
    }

    .gold-bg {
      background: #bd843c;
    }

    .gold-bg:hover {
      background: #98672e;
    }

    .gold-line {
      height: 1px;
      background: #d6ad7c;
      flex: 1;
    }

    .section-title {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 25px;
    }

    .section-title h2 {
      white-space: nowrap;
    }

    .gallery-item img {
      transition: transform .5s ease;
    }

    .gallery-item:hover img {
      transform: scale(1.06);
    }

    .hero-image {
      border-radius: 40% 0 0 40%;
    }

    .story-line {
      background: #c28a45;
      width: 2px;
    }

    .testimonial-box {
      box-shadow: 0 8px 30px rgba(125, 83, 35, .06);
    }

    .decorative {
      position: absolute;
      pointer-events: none;
      border: 1px solid #d6a15e;
      border-radius: 50%;
      opacity: .6;
    }

    @media (max-width: 768px) {
      .hero-image {
        border-radius: 20px;
      }

      .section-title {
        gap: 10px;
      }

      .section-title h2 {
        font-size: 20px;
      }
    }
  </style>
</head>


<!-- HERO -->
<section class="relative max-w-[1400px] mx-auto px-5 md:px-12 pt-10">

  <div class="grid md:grid-cols-2 gap-8 items-center">

      <!-- HERO IMAGE -->
      <div class="relative h-[300px] md:h-[400px] overflow-hidden hero-image">
  
        <video src="{{asset('storage/' . $aboutUs->video)}}" controls autoplay  loop playsinline></video>
  
        <!-- <div class="absolute inset-0 bg-gradient-to-l from-transparent to-[#68401d]/10"></div> -->
  
      </div>
    <!-- HERO TEXT -->
    <div class="text-center py-8">

      <div class="flex items-center justify-center gap-4 mb-6">
        <div class="gold-line max-w-20"></div>
        <span class="gold text-sm tracking-[4px]">ABOUT US</span>
        <div class="gold-line max-w-20"></div>
      </div>

      <h1 class="text-4xl md:text-5xl font-extrabold leading-[1.7] mb-5">
      {{$aboutUs->title}}
      </h1>
      <p class="text-base md:text-lg leading-9 text-[#604b36] max-w-md mx-auto mb-7">
        {{$aboutUs->description}}
      </p>

    </div>


  </div>

</section>


<!-- VIDEO AND WORKSHOP -->
<section class="max-w-[1400px] mx-auto px-5 md:px-12 py-5">

  <div class="grid md:grid-cols-2 gap-4">

    <!-- WORKSHOP -->
    @foreach($aboutUs->gallery as $gallery)
    @if($gallery->flag==1)
    <div class="relative h-[190px] md:h-[200px] rounded-2xl overflow-hidden group">
      <img
        src="{{asset('storage/' . $gallery->image)}}"
        alt="هنر ساخت طلا"
        class="w-full h-full object-cover">

    </div>
    @endif
    @endforeach

    <!-- VIDEO -->

  </div>

</section>


<!-- OUR STORY -->
<section id="story" class="relative max-w-[1400px] mx-auto px-5 md:px-12 py-12">

  <div class="grid md:grid-cols-3 gap-10 items-center">

    <!-- STORY TEXT -->
    <div class="md:col-span-2">

      <div class="section-title mb-8">
        <div class="gold-line"></div>
        <h2 class="text-3xl font-bold">داستان ما</h2>
        <div class="gold-line"></div>
      </div>

      <div class="text-center space-y-4 text-base md:text-lg leading-9 text-[#604b36]">
          <p>
            {{$aboutUs->ourStory}}
          </p>
      </div>

      <div class="text-center mt-8">
        <a href="#"
           class="inline-block gold-bg text-white rounded-full px-8 py-3 transition">
          ← درباره مسیر ما بیشتر بدانید
        </a>
      </div>

    </div>


    <!-- TIMELINE -->
    <div class="relative py-5">

      <div class="absolute right-[29px] top-12 bottom-12 story-line"></div>

      <div class="space-y-8">

        <div class="relative flex items-center gap-5">

          <div class="relative z-10 w-[60px] h-[60px] shrink-0 rounded-full border border-[#e7c9a5] bg-[#fff7ed] flex items-center justify-center text-3xl gold">
            ♢
          </div>

          <div>
            <h3 class="font-bold text-lg mb-1">آغاز یک رؤیا</h3>
            <p class="text-sm text-[#80664c]">شروع راه ما با علاقه به هنر</p>
          </div>

        </div>

        <div class="relative flex items-center gap-5">

          <div class="relative z-10 w-[60px] h-[60px] shrink-0 rounded-full border border-[#e7c9a5] bg-[#fff7ed] flex items-center justify-center text-3xl gold">
            ☆
          </div>

          <div>
            <h3 class="font-bold text-lg mb-1">رشد و پیشرفت</h3>
            <p class="text-sm text-[#80664c]">با تکیه بر اعتماد شما</p>
          </div>

        </div>

        <div class="relative flex items-center gap-5">

          <div class="relative z-10 w-[60px] h-[60px] shrink-0 rounded-full border border-[#e7c9a5] bg-[#fff7ed] flex items-center justify-center text-3xl gold">
            ♡
          </div>

          <div>
            <h3 class="font-bold text-lg mb-1">همراهی همیشگی</h3>
            <p class="text-sm text-[#80664c]">در مسیر درخشش</p>
          </div>

        </div>

      </div>

    </div>

  </div>

</section>




<!-- OUR VALUES -->
<section class="max-w-[1400px] mx-auto px-5 md:px-12 py-16">

  <!-- TITLE -->
  <div class="section-title mb-5">
    <div class="gold-line"></div>
    <h2 class="text-2xl md:text-3xl font-bold">
      ارزش‌های ما
    </h2>
    <div class="gold-line"></div>
  </div>

  <p class="text-center text-[#80664c] mb-12 leading-8">
    آنچه ما را متمایز می‌کند، باورهایی است که در تمام مسیر همراه ما هستند.
  </p>

  <!-- VALUES CARDS -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

    <!-- CARD 1 -->
     @foreach($aboutUs->value as $value)
    <div class="group bg-[#fffaf3] border border-[#ead8c0] rounded-2xl p-7 text-center transition duration-300 hover:-translate-y-2 hover:shadow-xl">
      <div class="min-w-20 max-w-20 h-20 mx-auto mb-5 rounded-full bg-[#f4e6d2] flex items-center justify-center text-3xl gold">
          <img class="" src="{{asset('storage/' . $value->image)}}" alt="">
      </div>

      <h3 class="text-lg font-bold mb-3">
        {{$value->title}}
      </h3>

      <p class="text-sm text-[#80664c] leading-8">
        {{$value->description}}
      </p>

    </div>
    @endforeach
  </div>

</section>



<!-- PORTFOLIO -->
<section class="max-w-[1400px] mx-auto px-5 md:px-12 py-10">

  <div class="section-title mb-4">
    <div class="gold-line"></div>
    <h2 class="text-2xl md:text-3xl font-bold">
      آثار ما، امضای هنر ما
    </h2>
    <div class="gold-line"></div>
  </div>

  <p class="text-center text-[#80664c] mb-8">
    نگاهی به مجموعه‌ای از طراحی‌ها و نمونه‌کارهای ما
  </p>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
  @foreach($aboutUs->gallery as $gallery)
  @if($gallery->flag==0)
    <div class="gallery-item rounded-2xl overflow-hidden h-[230px] md:h-[260px]">
      <img
        src="{{asset('storage/' . $gallery->image)}}"
        alt="انگشتر"
        class="w-full h-full object-cover">
    </div>
    @endif
    @endforeach

  </div>

</section>


<!-- TESTIMONIALS -->
<section class="max-w-[1200px] mx-auto px-5 md:px-12 py-12 mb-16">

  <div class="section-title mb-8">
    <div class="gold-line"></div>
    <h2 class="text-2xl md:text-3xl font-bold">
      نظرات مشتریان
    </h2>
    <div class="gold-line"></div>
  </div>

  <div class="flex items-center gap-4">

    <!-- PREVIOUS -->
    <button aria-label="نظر قبلی"
      class="hidden md:flex w-12 h-12 shrink-0 rounded-full border border-[#bd843c] items-center justify-center text-2xl gold hover:bg-[#bd843c] hover:text-white transition">
      ‹
    </button>

    <!-- COMMENT BOX -->
    <div class="testimonial-box flex-1 bg-[#fff9f1] border border-[#f0dfca] rounded-2xl p-6 md:p-8">

      <div class="flex flex-col-reverse md:flex-row items-center gap-8">

        <div class="shrink-0">
          <img
            src="{{asset('assets/img/user.png')}}"
            alt="مشتری"
            class="w-28 h-28 rounded-full object-cover">
        </div>

        <div class="flex-1 text-center md:text-right">

          <span class="text-5xl gold font-bold">”</span>

          <p class="text-base md:text-xl leading-9 mb-5">
            کیفیت بی‌نظیر، طراحی خاص و برخورد حرفه‌ای.
            تجربه خرید من از گلدِه فوق‌العاده بود.
          </p>

          <p class="text-sm text-[#a57a48]">
            مریم احمدی | مشتری وفادار
          </p>

        </div>

      </div>

    </div>

    <!-- NEXT -->
    <button aria-label="نظر بعدی"
      class="hidden md:flex w-12 h-12 shrink-0 rounded-full border border-[#bd843c] items-center justify-center text-2xl gold hover:bg-[#bd843c] hover:text-white transition">
      ›
    </button>

  </div>

  <!-- SLIDER DOTS -->
  <div class="flex items-center justify-center gap-3 mt-7">

    <span class="w-3 h-3 rounded-full gold-bg"></span>
    <span class="w-3 h-3 rounded-full bg-[#e8d4bc]"></span>
    <span class="w-3 h-3 rounded-full bg-[#e8d4bc]"></span>
    <span class="w-3 h-3 rounded-full bg-[#e8d4bc]"></span>
    <span class="w-3 h-3 rounded-full bg-[#e8d4bc]"></span>

  </div>

</section>



@endsection
