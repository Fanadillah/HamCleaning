@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[60vh] bg-gradient-to-br from-indigo-50 to-white rounded-lg shadow-lg p-8">
    <h1 class="text-4xl md:text-5xl font-extrabold mb-4 text-indigo-700 drop-shadow">Selamat Datang di Ham & Cleaning</h1>
    <p class="mb-6 text-center text-lg md:text-xl text-gray-700 max-w-2xl">
        Kami siap membantu Anda menjaga kebersihan rumah dan kantor Anda dengan layanan profesional, ramah, dan terpercaya.
    </p>
    <div class="flex flex-col md:flex-row gap-4">
        <a href="#layanan" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-lg shadow transition scroll-smooth">
            Lihat Layanan Kami
        </a>
        <a href="{{ route('register') }}" class="bg-white border border-indigo-600 text-indigo-700 hover:bg-indigo-50 font-semibold px-6 py-3 rounded-lg shadow transition">
            Daftar Sekarang
        </a>
    </div>
    <div class="mt-8 flex flex-wrap justify-center gap-6">
        <div class="flex flex-col items-center">
            <svg class="w-10 h-10 text-green-500 mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"></path></svg>
            <span class="font-medium text-gray-700">Bersih & Higienis</span>
        </div>
        <div class="flex flex-col items-center">
            <svg class="w-10 h-10 text-blue-500 mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8v4l3 3"></path><circle cx="12" cy="12" r="10"></circle></svg>
            <span class="font-medium text-gray-700">Tepat Waktu</span>
        </div>
        <div class="flex flex-col items-center">
            <svg class="w-10 h-10 text-yellow-500 mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 6v6l4 2"></path><circle cx="12" cy="12" r="10"></circle></svg>
            <span class="font-medium text-gray-700">Layanan Profesional</span>
        </div>
    </div>
</div>

{{-- Section Layanan --}}
<div id="layanan" class="max-w-5xl mx-auto mt-16 mb-12 px-4 scroll-mt-24">
    <h2 class="text-3xl font-bold text-center text-indigo-700 mb-8">Layanan Kami</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center hover:shadow-lg transition">
            <svg class="w-12 h-12 text-indigo-500 mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><path d="M9 22V12h6v10"/></svg>
            <h3 class="text-xl font-semibold mb-2">Pembersihan Rumah</h3>
            <p class="text-gray-600 text-center">Layanan pembersihan menyeluruh untuk rumah Anda, mulai dari ruang tamu, kamar tidur, dapur, hingga kamar mandi.</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center hover:shadow-lg transition">
            <svg class="w-12 h-12 text-green-500 mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M16 12H8"/><path d="M12 16V8"/></svg>
            <h3 class="text-xl font-semibold mb-2">Pembersihan Kantor</h3>
            <p class="text-gray-600 text-center">Menjaga kebersihan dan kenyamanan ruang kerja Anda dengan layanan pembersihan kantor profesional.</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center hover:shadow-lg transition">
            <svg class="w-12 h-12 text-yellow-500 mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect width="20" height="14" x="2" y="5" rx="2"/><path d="M2 10h20"/></svg>
            <h3 class="text-xl font-semibold mb-2">Cuci Sofa & Karpet</h3>
            <p class="text-gray-600 text-center">Layanan cuci sofa dan karpet dengan peralatan modern agar tetap bersih, wangi, dan bebas kuman.</p>
        </div>
    </div>
</div>

<div class="max-w-5xl mx-auto mb-16 px-4">
    <h2 class="text-3xl font-bold text-center text-indigo-700 mb-8">Testimoni Pelanggan</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Testimoni 1" class="w-16 h-16 rounded-full mb-3">
            <p class="italic text-gray-600 text-center mb-2">"Pelayanan sangat memuaskan, rumah saya jadi bersih dan wangi!"</p>
            <span class="font-semibold text-indigo-700">- Siti, Jakarta</span>
        </div>
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Testimoni 2" class="w-16 h-16 rounded-full mb-3">
            <p class="italic text-gray-600 text-center mb-2">"Timnya ramah dan profesional. Sangat direkomendasikan!"</p>
            <span class="font-semibold text-indigo-700">- Budi, Bandung</span>
        </div>
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Testimoni 3" class="w-16 h-16 rounded-full mb-3">
            <p class="italic text-gray-600 text-center mb-2">"Kantor kami jadi lebih nyaman setelah rutin dibersihkan."</p>
            <span class="font-semibold text-indigo-700">- Lina, Surabaya</span>
        </div>
    </div>
</div>

<div class="max-w-4xl mx-auto mb-16 px-4">
    <h2 class="text-3xl font-bold text-center text-indigo-700 mb-8">FAQ</h2>
    <div class="space-y-6">
        <div class="bg-white rounded-lg shadow p-5">
            <h3 class="font-semibold text-indigo-600 mb-2">Bagaimana cara memesan layanan?</h3>
            <p class="text-gray-700">Anda dapat memesan layanan dengan mendaftar akun, lalu memilih layanan yang diinginkan dan mengisi formulir pemesanan di website kami.</p>
        </div>
        <div class="bg-white rounded-lg shadow p-5">
            <h3 class="font-semibold text-indigo-600 mb-2">Apakah saya bisa memilih jadwal sendiri?</h3>
            <p class="text-gray-700">Tentu, Anda dapat memilih tanggal dan waktu sesuai keinginan saat melakukan pemesanan.</p>
        </div>
        <div class="bg-white rounded-lg shadow p-5">
            <h3 class="font-semibold text-indigo-600 mb-2">Bagaimana metode pembayarannya?</h3>
            <p class="text-gray-700">Pembayaran dapat dilakukan melalui transfer bank setelah Anda menerima instruksi pembayaran pada halaman booking.</p>
        </div>
        <div class="bg-white rounded-lg shadow p-5">
            <h3 class="font-semibold text-indigo-600 mb-2">Apakah layanan tersedia di luar kota?</h3>
            <p class="text-gray-700">Saat ini layanan kami tersedia di area Jabodetabek, Bandung, dan Surabaya. Untuk area lain, silakan hubungi customer service kami.</p>
        </div>
    </div>
</div>


<div class="max-w-3xl mx-auto mb-16 px-4">
    <h2 class="text-3xl font-bold text-center text-indigo-700 mb-8">Hubungi Kami</h2>
    <div class="bg-white rounded-lg shadow p-8 flex flex-col md:flex-row items-center gap-8">
        <div class="flex-1 mb-6 md:mb-0">
            <h3 class="text-lg font-semibold mb-2 text-indigo-600">Customer Service</h3>
            <p class="text-gray-700 mb-2">Jika Anda memiliki pertanyaan atau membutuhkan bantuan, silakan hubungi kami:</p>
            <ul class="text-gray-700 space-y-1">
                <li><strong>Email:</strong> <a href="mailto:cs@cleaningservice.com" class="text-indigo-600 hover:underline">cs@cleaningservice.com</a></li>
                <li><strong>Telepon:</strong> <a href="tel:081234567890" class="text-indigo-600 hover:underline">0812-3456-7890</a></li>
                <li><strong>WhatsApp:</strong> <a href="https://wa.me/6281234567890" target="_blank" class="text-indigo-600 hover:underline">0812-3456-7890</a></li>
            </ul>
        </div>
        <div class="flex-1">
            <form class="space-y-4">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="nama" name="nama" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Nama Anda" disabled>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Email Anda" disabled>
                </div>
                <div>
                    <label for="pesan" class="block text-sm font-medium text-gray-700">Pesan</label>
                    <textarea id="pesan" name="pesan" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Tulis pesan Anda..." disabled></textarea>
                </div>
                <button type="button" class="w-full bg-indigo-400 text-white font-semibold py-2 rounded cursor-not-allowed" disabled>
                    Kirim (Coming Soon)
                </button>
            </form>
        </div>
    </div>
</div>


<div class="max-w-4xl mx-auto mb-16 px-4">
    <h2 class="text-3xl font-bold text-center text-indigo-700 mb-8">Lokasi & Area Layanan</h2>
    <div class="bg-white rounded-lg shadow p-8 flex flex-col md:flex-row items-center gap-8">
        <div class="flex-1 mb-6 md:mb-0">
            <h3 class="text-lg font-semibold mb-2 text-indigo-600">Area Jangkauan</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
                <li>Jakarta, Bogor, Depok, Tangerang, Bekasi (Jabodetabek)</li>
                <li>Bandung dan sekitarnya</li>
                <li>Surabaya dan sekitarnya</li>
            </ul>
            <p class="mt-4 text-gray-600">Untuk area di luar daftar di atas, silakan hubungi customer service kami untuk informasi lebih lanjut.</p>
        </div>
        <div class="flex-1">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.306257993367!2d106.8271533153702!3d-6.214620995498998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e8c2b2e2e7%3A0x2e8c2b2e2e7!2sJakarta!5e0!3m2!1sen!2sid!4v1680000000000!5m2!1sen!2sid" 
                width="100%" height="220" style="border:0; border-radius: 0.5rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>


@endsection
