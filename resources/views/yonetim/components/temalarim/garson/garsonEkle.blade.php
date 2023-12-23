<style>
    .select-options-list {
        list-style: none;
        margin: 0;
        padding: 10px;
        position: sticky;
    }
</style>

<div class="container">
    <!-- Sign up form -->
    <form action="{{ route('garson.store', ['id' => $id]) }}" method="post" enctype="multipart/form-data">

        @csrf
        <!-- Sign up card -->
        <div class="card person-card">
            <div class="card-body">

                <div class="row">


                    <div class="form-group col-md-6">
                        <label class="col-12">Garson Adı</label>

                        <select class="form-select telegram" name="garson_id" required>


                        </select>

                    </div>


                    <div class="form-group col-md-6">
                        <label class="col-12">Masa Tanımla</label>
                        <select name="masa_id[]" class="select" multiple required>

                            @foreach ($masa as $item)
                                <option value="{{ $item->id }}">{{ $item->masa_adi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input class="garson_adi" type="text" name="garson_adi" hidden>
                </div>

            </div>
        </div>
</div>
<div style="margin-top: 1em;">
    <button type="submit" class="btn btn-dark btn-lg btn-block">EKLE</button>
</div>
</form>



<style>
    body {
        background-color: #e9ebee;
    }

    .card {
        margin-top: 1em;
    }
</style>

<script>
    var nf = new Intl.NumberFormat();

    $(document).ready(function() {

        function tekrarSil(data) {
            var seen = {};
            var uniqueData = [];

            for (var i = 0; i < data.length; i++) {
                // Eğer öğe null değilse ve chat özelliği varsa devam et
                if (data[i] && data[i].chat && data[i].chat.id) {
                    var chatId = data[i].chat.id;

                    if (!seen[chatId]) {
                        uniqueData.push(data[i]);
                        seen[chatId] = true;
                    }
                }
            }

            return uniqueData;
        }


        $.getJSON("https://api.telegram.org/bot6772062485:AAFM64_NymKrlBJ2TAKyUdu82fDq6jOch0M/getUpdates",
                function(data) {

                    let veri = [];
                    $('.telegram').append("<option value=''>Lütfen Telegram Adını Giriniz</option>");

                    $.each(data.result, function(key, value) {

                        veri.push(value.message);
                    });

                    const uniqveri = tekrarSil(veri);

                    $.each(uniqveri, function(key, value) {

                        $('.telegram').append("<option data-name ='" + value.chat.first_name + " " +
                            value.chat.last_name +
                            "' value='" + value.chat.id + "'>" + value.chat
                            .first_name +
                            ' ' + value.chat.last_name + "</option>");

                        console.log(value.chat.id);
                    });



                    $('.telegram').change(function(e) {
                        var selectedOption = $(this).find(':selected');
                        var selectedName = selectedOption.data('name');
                        $('.garson_adi').val(selectedName);

                    });

                })
            .fail(function(jqxhr, textStatus, error) {
                var err = textStatus + ", " + error;
                console.log("Request Failed: " + err);
            });


    });
</script>
