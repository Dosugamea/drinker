let isRequested = false;

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
        if (!isRequested) {
            isRequested = true;
            $.ajax({
                type: "post",
                url: "/ask/product",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                dataType: "json",
                data: {
                    'jan_code': code
                }
              })
                //通信が成功したとき
                .done((res) => {
                    $('#productName')[0].value = res.name;
                    $('#productCompany')[0].value = res.company;
                    $('#productVolume')[0].value = res.volume;
                    $('#productName').prop("disabled", false);
                    $('#productCompany').prop("disabled", false);
                    $('#productVolume').prop("disabled", false);
                    $('#janCodeModal').modal('hide');
                    isRequested = false;
                })
                //通信が失敗したとき
                .fail((error) => {
                    if (error.status == 404) {
                        alert(error.responseJSON.resp)
                    } else {
                        alert(error.statusText);
                    }
                    $('#janCodeModal').modal('hide');
                    isRequested = false;
            });
        }
    });
}
function stopCamera() {
    Quagga.stop();
}