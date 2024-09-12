(function ($) {
     // Tüm qr-code-wrapper elemanlarını seçip her biri için işlemleri yapıyoruz
     $('.qrcode').each(function (_index, element) {
         var qrCodeImage = $(element);
         var qr_downloader = $(element).closest('.tw-p-6').find('.qr-code-downloader');
       var wrapper= $('.qr-code-wrapper');
      console.log( wrapper.attr('data-url'));
      createQRCode(qrCodeImage,wrapper.attr('data-url'));
 
         // QR kodunu indir
         qr_downloader.on('click', function (e) {
             e.preventDefault();
             downloadQR(qrCodeImage);
         });
     });
 
     function createQRCode(qrCodeImage,_url) {
        try {
          console.log(_url);
          qrCodeImage.qrcode({
               typeNumber: 10,
              text:_url,
           
              fontname: 'Nunito',
              size: 80,
              ecLevel: 'Q',
              minVersion: 3,
          });
        } catch (error) {
          console.log(error);
        }
     }
 
     function downloadQR(qrCodeImage) {
         var imgsrc = qrCodeImage.find('img').attr('src');
         var image = new Image();
         image.src = imgsrc;
         image.onload = function () {
             var canvas = document.createElement('canvas');
             canvas.width = image.width;
             canvas.height = image.height;
             var canvasCtx = canvas.getContext('2d');
             canvasCtx.drawImage(image, 0, 0);
             var imgData = canvas.toDataURL('image/png');
 
             var a = document.createElement("a");
             a.download = "qr-code.png";
             a.href = imgData;
             a.click();
         };
     }
 
     $(window).on('load', function f() {
         // Henüz kullanılmayan bir yükleme fonksiyonu
     });
 
 })(jQuery);