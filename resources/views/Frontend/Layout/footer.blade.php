{{-- Footer Start --}}

<section class="head-footer">
    <div class="container">
      <div class="row">

        <div class="col-md-4">
          <h4>PT. Acara Sukses</h4>
          <small>Jl. Raya Timur Balamoa, Desa Kebandingan Kecamatan Kedungbanteng Kabupaten Tegal, 52472</small>
          <div class="row" style="margin-top: 7%">
            <table class="table table-sm">
                <tbody>
                  <tr>
                    <td style="width: 50px;">
                        <img src="{{asset('assets/img/icons/call.png')}}" class="img-fluid" alt="..." width="25">
                    </td>
                    <td>+62877 3388 5081</td>
                  </tr>
                  <tr>
                    <td style="width: 50px;">
                        <img src="{{asset('assets/img/icons/instagram.png')}}" class="img-fluid" alt="..." width="25">
                    </td>
                    <td>@kotaktani_indonesia</td>
                  </tr>
                </tbody>
            </table>
            {{-- <div class="col-2">
              <center>
                <img src="{{asset('assets/img/icons/call.png')}}" class="img-fluid" alt="..." width="30">
              </center>
            </div>
            <div class="col-10">
              <h5 class="mt-0">Hubungi Kami</h5>
            </div> --}}
          </div>
        </div>

        <div class="col-md-4">
          <h4>Kantor Kami</h4>
          <br>
          <div class="container-fluid">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1177.4873241813434!2d109.20287350343656!3d-6.94075515178945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fc74a8c4bbd6d%3A0x5027a76e35662f0!2sKebandingan%2C%20Kedung%20Banteng%2C%20Tegal%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1613091280537!5m2!1sen!2sid" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
        </div>

        <div class="col-md-4">
          <h4>Subscribe</h4>
          <small>Masukan email kamu untuk menerima informasi terbaru dari kami.</small>
          <form class="form-inline">
            <div class="form-group mx-sm-2 mt-2">
              <input type="email" class="form-control" id="email" placeholder="Email Kamu">
            </div>
            <div class="form-group mx-sm-2 mt-2">
                <button type="submit" class="btn btn-primary" id="btn-subscribe" style="width: 100px;">Kirim</button>
            </div>
          </form>
        </div>

      </div>
    </div>
</section>

<footer class="footer" style="background-color: #e8ecfc;">
    <div class="container">
        <hr>
        <p class="text-center" style="font-size: 12px; color: #8A8A8A;">&copy;{!! date("Y") !!} Hajatan</p>
    </div>
</footer>

{{-- Footer end --}}
