@extends($activeTheme.'layouts.mainindex')

@section('content')
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CraftOrder Hakkımızda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Header -->
    <header class="bg-blue-600 text-white py-6">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold">CraftOrder Hakkımızda</h1>
            <p class="mt-2 text-lg">Verilerinizin gizliliğine büyük önem veriyoruz.</p>
        </div>
    </header>

    <!-- Content -->
    <main class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <section class="mb-8">
            <h2 class="text-3xl font-semibold mb-4">Biz Kimiz?</h2>
            <p class="leading-relaxed text-lg">
                CraftOrder, restoran ve kafelerin iş süreçlerini dijitalleştiren, QR tabanlı menü sistemleri sunan yenilikçi bir teknoloji firmasıdır. Amacımız, müşterilere kolay ve hızlı sipariş imkanı sunarken, işletme sahiplerine de operasyonel kolaylık ve verimlilik sağlamaktır. 
                Kuruluşumuzdan bu yana, sayısız işletmeye dijital dönüşüm yolculuğunda rehberlik ettik.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-3xl font-semibold mb-4">Misyonumuz</h2>
            <p class="leading-relaxed text-lg">
                Misyonumuz, işletmelerin müşteri memnuniyetini artırmak ve sipariş yönetimini modernize etmek için güçlü ve kullanıcı dostu çözümler geliştirmektir. CraftOrder ile masalarda menü bekleme süresi azalır, personel yükü hafifler ve müşteri memnuniyeti artar.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-3xl font-semibold mb-4">Vizyonumuz</h2>
            <p class="leading-relaxed text-lg">
                Vizyonumuz, dünya çapında restoran ve kafe işletmelerinin tercih ettiği bir teknoloji markası olmaktır. İşletmelere geleceğin restoran deneyimini sunmak ve onları dijital çağın öncüsü yapmak istiyoruz.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-3xl font-semibold mb-4">Değerlerimiz</h2>
            <ul class="list-disc pl-5 space-y-2 text-lg">
                <li>Yenilikçilik: Müşterilerimize en güncel ve en yenilikçi çözümleri sunmak için çalışıyoruz.</li>
                <li>Güvenilirlik: Verilerinizin güvenliği ve gizliliği bizim için en öncelikli konular arasında yer alır.</li>
                <li>Müşteri Odaklılık: İşletmelerin ihtiyaçlarına göre çözümler üretiyoruz ve her adımda onların yanında oluyoruz.</li>
            </ul>
        </section>

        <section class="mb-8">
            <h2 class="text-3xl font-semibold mb-4">Neden CraftOrder?</h2>
            <p class="leading-relaxed text-lg">
                CraftOrder, işletmelerin sipariş süreçlerini daha hızlı ve etkili hale getirir. Restoran ve kafelerde QR menü kullanımı, menü güncellemelerini anlık yapabilme, müşteri memnuniyetini artırma ve operasyonel maliyetleri düşürme imkanı sağlar. Ayrıca, detaylı raporlarla işletme sahipleri, personel performanslarını ölçümleyebilir ve iş süreçlerini optimize edebilir.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-3xl font-semibold mb-4">İletişim</h2>
            <p class="leading-relaxed text-lg">Bu Hakkımızda sayfası hakkında sorularınız varsa, bizimle iletişime geçin:</p>
            <p class="text-lg font-semibold">E-posta: destek@craftorder.com</p>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 CraftOrder. Tüm hakları saklıdır.</p>
        </div>
    </footer>

</body>
</html>
@endsection