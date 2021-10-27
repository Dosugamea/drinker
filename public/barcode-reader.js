function startCamera() {
    Quagga.init({
        inputStream: {
            type : 'LiveStream',
            target: document.querySelector("#camera-area"),
            constraints: {
                decodeBarCodeRate: 3,
                successTimeout: 500,
                codeRepetition: true,
                tryVertical: true,
                frameRate: 15,
                width: 640,
                height: 480,
                facingMode: "environment"
            },
            area: { top: "30%", right: "0%", left: "0%", bottom: "30%" },
            numOfWorkers: navigator.hardwareConcurrency || 4
        },
        decoder: {
            readers: [{
                format: 'ean_reader',
                config: {}
            }],
            multiple: false,
            debug: {
                drawBoundingBox: true,
                showFrequency: false,
                drawScanline: true,
                showPattern: true
            }
        }
    }, (err) => {
        if(!err) {
            Quagga.start();
        }
    });
    Quagga.onDetected((result) => {
        stopCamera();
        const code = result.codeResult.code;
        $('#janCode')[0].value = code;
        // CSRF対策
        $.ajaxSetup({
            headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "post",
            url: "/ask/product",
            dataType: "json",
            data: {
                'jan_code': code
            }
          })
            //通信が成功したとき
            .done((res) => {
              $('#productName')[0].value = res.name;
              $('#janCodeModal').modal('hide');
            })
            //通信が失敗したとき
            .fail((error) => {
              alert(error.statusText);
              $('#janCodeModal').modal('hide');
        });
    });
}
function stopCamera() {
    Quagga.stop();
}