

<style media="screen">


  .photo-modal {
    width: 100%; height: 100%;position: fixed;left: 0;top: 0;z-index: 10;background-color: rgba(0,0,0,0.5);
    display: none;
  }
  .photo-modal-show {
    display: block;
  }


  .update-photo-message {
    max-width: 500px; min-height: 200px; background-color: rgba(255,255,255, 0.95);margin: 150px auto;padding: 30px;
    border-radius: 3px;border: 2px solid rgba(255,255,255, 0.95);
    /* box-shadow: 1px 1px 3px rgba(255,255,255, 1); */
  }
  .update-photo-message:hover {
    /* background-color: rgba(255,255,255, 0.8);*/
    border: 2px solid rgba(255,255,255, 0.6);
    box-shadow: 1px 1px 8px rgba(255,255,255, 0.6);
  }
  .update-photo-message .--header {
    position: relative;max-height: 50px;
    text-align: center;font-size: 30px;
  }
  .update-photo-message .--header .close-icon {
    color: #6667a6;position: absolute;top: 0;right: 10px;cursor: pointer;
  }
  .update-photo-message .--header .close-icon:hover {color: #6667a6; text-shadow: 1px 1px 1px #6667a6}
  .update-photo-message .--body {
    display: flex;justify-content: center;align-items: center;font-size: 25px;width: 100%;min-height: 150px;
    padding: 0 50px;
  }

</style>

<div class="photo-modal">
  <div class="update-photo-message">
    <div class="--header">
      {{-- <h3>Thông báo</h3> --}}
      <span class="fa fa-times close-icon" id="close-icon"></span>
    </div>
    <div class="--body">

      <p id="upload-pho-to-message" style="font-family: 'Baomoi'; line-height: 25px; text-align:center">{{session('my_message')}}</p>
      {{-- <p id="upload-pho-to-message" style="font-family: 'Baomoi'">asd</p> --}}
      {{-- <p style="font-family: 'Baomoi'">Đổi ảnh thành công</p> --}}
    </div>

  </div>
</div>
