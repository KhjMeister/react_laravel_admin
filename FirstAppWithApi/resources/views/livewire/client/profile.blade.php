  
  <div class="content">
    <section>
        <div class="detail-profile">
            <div class="img-profile">
                <img src="./client/assets/images/petyerheadshot7744252d68dc7099fb9dc016e4bbd540_thumb 5.png"
                    alt="">
            </div>
            
            <form wire:submit.prevent="updateProfile" class="profile-form">
                <div class="form-group">
                    <div class="item-form-group">
                        <label for="نام">نام</label>
                        <input wire:model.debounce.1000ms="name" class="@error('name') is-invalid @enderror" type="text" placeholder="نام ">
                        @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="item-form-group">
                        <label for="نام و نام خانوادگی"> نام خانوادگی</label>
                        <input wire:model.debounce.1000ms="family" class="@error('family') is-invalid @enderror" type="text" placeholder="نام خانوادگی">
                        @error('family') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="item-form-group full-with">
                    <label for="پست الکترونیک">پست الکترونیک</label>
                    <input wire:model.debounce.1000ms="email" class="@error('email') is-invalid @enderror" type="text" placeholder="ایمیل خود را وارد کنید">
                    @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="form-group responsive-flex">
                    <div class="item-form-group">
                        <label for="شماره موبایل">شماره تماس</label>
                        <input wire:model.debounce.1000ms="phone" class="@error('phone') is-invalid @enderror" type="text" placeholder="09******95">
                        @error('phone') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="item-form-group">
                        <label for="کلمه عبور">کلمه عبور</label>
                        <input wire:model.debounce.1000ms="password" class="@error('password') is-invalid @enderror" wire:change="passChange" type="password" placeholder="************">
                        @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                </div>
                <button type="submit">ویرایش</button>
            </form>
        </div>
    </section>
</div>
