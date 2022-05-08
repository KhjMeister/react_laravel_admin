 <!--modal New voice call-->
         <div wire:ignore.self class="modal fade" id="edite" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="requests">
                        <div class="title" style="padding: .5rem 1rem 0;">
                            <button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i
                                    class="ti-close"></i></button>
                            <h1>ویرایش  مخاطب</h1>
                            <button type="button" class="btn call-btn " data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-phone"></i>
                            </button>
                        </div>
                        <div class="content">
                            <form class="form text-center" dir="rtl">
                                <div class="form-input text-right">
                                    <label for="username">نام و نام خانوادگی</label>
                                    <br>
                                    <input type="text" wire:model="username" id="username">
                                </div>
                                <div class="form-input text-right my-3">
                                    <label for="phone">شماره موبایل</label>
                                    <br>
                                    <input wire:model="phone" type="text" id="phone">
                                </div>
                                <div class="form-input text-right my-3">
                                    <label for="semat">نسبت یا سمت اداری</label>
                                    <br>
                                    <input wire:model="semat" type="text" id="semat">
                                </div>
                                <button wire:click.prevent="updateContact()" data-dismiss="modal" class="btn btn-vip text-white my-2">  ویرایش مخاطب </button>

                                
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- Add Friends -->