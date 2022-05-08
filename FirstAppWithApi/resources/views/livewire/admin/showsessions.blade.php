         <!--modal New voice call-->
         <div wire:ignore.self class="modal fade" id="showsession" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="requests">
                        <div class="title" style="padding: .5rem 1rem 0;">
                            <button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i
                                    class="ti-close"></i></button>
                            <h1>جلسات فعال شما</h1>
                            <button type="button" class="btn call-btn " data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-phone"></i>
                            </button>
                        </div>
                        <div class="content form text-center" dir="rtl">
                            @foreach($thisUserSession as $sessio)
                            <div class="contact-select d-flex align-items-center justify-content-between">
                                <a class=" d-flex py-3 px-1" href="{{ route('sess',['sessid'=>$sessio->id])}}">
                                    <img class="avatar-md" src="{{ asset('rv/img/avatars/profile.png') }}"
                                        data-toggle="tooltip" data-placement="top" title="Sarah" alt="avatar">
                                    <div class="data mr-3">
                                        <div class="user-contact">{{ $sessio->name }}</div>
                                        <div class="text-muted text-right" style="font-size: .8rem">
                                            <span></span>
                                            <i>{{ $sessio->phone }}</i>
                                        </div>
                                    </div>
                                </a>
                                <a style="pointer:cursor;" wire:click="deletesession({{$sessio->id}})" id="my_check_{{ $sessio->id }}" >
                                <label class="checkbox" for="my_check_{{ $sessio->id }}">
                                    <span class="checkbox__input">
                                        
                                            <i class="fa fa-trash"></i>
                                        
                                    </span>
                                </label>
                                </a>
                            </div>
                            @endforeach
                            <br>
                            <a href="{{ route('session') }}"class="btn btn-vip text-white my-2 form text-center">اضافه کردن جلسه</a>
                        
                        </div>
                        
                    </div>
                </div>
            </div><!-- Add Friends -->