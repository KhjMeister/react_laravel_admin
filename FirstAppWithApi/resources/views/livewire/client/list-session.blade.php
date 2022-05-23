<div class="content" >
@if($editSessionFlag===False)
    <section>
        <div class="listmeeting-detail">
            <div class="item-listmeeting">
                <h5>لیست جلسات </h5>
                
            </div>
            <div class="item-search" style="position: relative;">
                <input wire:keydown="getAllSession" wire:model.debounce.1000ms="search" type="search" class="search"
                placeholder="جست وجو در جلسات ....">
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.635 17.8725L15.7637 13.9996C18.6604 10.1286 17.8706 4.64234 13.9996 1.74566C10.1286 -1.15102 4.64234 -0.361187 1.74566 3.50978C-1.15102 7.38076 -0.361187 12.8671 3.50979 15.7637C6.61927 18.0906 10.8901 18.0906 13.9996 15.7637L17.8725 19.6366C18.3592 20.1233 19.1483 20.1233 19.635 19.6366C20.1217 19.1499 20.1217 18.3609 19.635 17.8742L19.635 17.8725ZM8.78697 15.0162C5.34663 15.0162 2.55772 12.2273 2.55772 8.78697C2.55772 5.34663 5.34663 2.55772 8.78697 2.55772C12.2273 2.55772 15.0162 5.34663 15.0162 8.78697C15.0126 12.2257 12.2258 15.0126 8.78697 15.0162Z" fill="#4D4D4D"/>
                        </svg>
            
            </div>
        </div>
    </section>
    <div class="table">
        <table class="tablelistmeeting" wire:poll.1000ms>
            <tr>
                <th>شماره جلسه</th>
                <th>عنوان جلسه</th>
                <th>تاریخ شروع جلسه</th>
                <th>زمان شروع جلسه</th>
                <th>وضعیت جلسات</th>
                <th>ویرایش جلسه</th>
                <th>حذف جلسه</th>
            </tr>

            @if(!$allsessions==null)
                @foreach ($allsessions as $sess)
                <tr>
                    <td>
                        {{ $sess->id }}
                    </td>
                    <td>
                        {{ $sess->name }}
                    </td>
                    <td>
                        {{ $sess->start_date }}
                    </td>
                    <td>
                        {{ $sess->start_time }} 
                    </td>
                    <td>
                       <a href="{{ $sess->video_link }}" target="_blank">درحال برگزاری</a>    
                    </td>
                    <td>
                    <svg wire:click="editeSessionContacts({{ $sess->id }})" class="link-mouse-hover"  width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.6686 1.3073C16.1271 0.78915 15.407 0.5 14.6581 0.5C13.9092 0.5 13.1891 0.78915 12.6477 1.3073L0.5 13.4731V17.5H4.52089L16.6686 5.33419C17.201 4.79978 17.5 4.07568 17.5 3.32075C17.5 2.56582 17.201 1.84171 16.6686 1.3073ZM3.64105 15.3716H2.6252V14.3543L11.5886 5.37818L12.6045 6.39483L3.64105 15.3716Z" fill="#888888"/>
                        </svg>
                    </td>
                    <td>
                        <svg wire:click="deleteSession({{ $sess->id }})" class="link-mouse-hover" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 6.375C21 5.75368 20.4505 5.25 19.7727 5.25H16.6833C16.1663 3.90552 14.7824 3.00457 13.2273 3H10.7727C9.21759 3.00457 7.83372 3.90552 7.31673 5.25H4.22727C3.54947 5.25 3 5.75368 3 6.375C3 6.99632 3.54947 7.5 4.22727 7.5H4.63637V16.875C4.63637 19.1532 6.65109 21 9.13636 21H14.8636C17.3489 21 19.3636 19.1532 19.3636 16.875V7.5H19.7727C20.4505 7.5 21 6.99632 21 6.375ZM16.9091 16.875C16.9091 17.9105 15.9933 18.75 14.8636 18.75H9.13636C8.00669 18.75 7.09092 17.9105 7.09092 16.875V7.5H16.9091V16.875Z" fill="#F51100"/>
                            <path d="M9.95457 16.5C10.6324 16.5 11.1818 15.9963 11.1818 15.375V10.875C11.1818 10.2537 10.6324 9.75 9.95457 9.75C9.27677 9.75 8.72729 10.2537 8.72729 10.875V15.375C8.72729 15.9963 9.27677 16.5 9.95457 16.5Z" fill="#F51100"/>
                            <path d="M14.0454 16.5C14.7232 16.5 15.2727 15.9963 15.2727 15.375V10.875C15.2727 10.2537 14.7232 9.75 14.0454 9.75C13.3676 9.75 12.8182 10.2537 12.8182 10.875V15.375C12.8182 15.9963 13.3676 16.5 14.0454 16.5Z" fill="#F51100"/>
                        </svg>
                    </td>
                </tr>
            @endforeach
            @else
                <tr >جلسه ای وجود ندارد</tr>
            @endif
        </table>
    </div>
@elseif($editSessionFlag===True)
<div class="content">
    <section>
        <div class="title">
            <div  class="back">
                
            </div>
        </div>
        @if($this->level===1)
        <div class="boxes">
            <form class="box" wire:submit.prevent="updateSession">
                <div class="title">
                    <p>عنوان جلسه</p>
                    <button > بعدی</button>
                </div>
                <div class="name-session">
                    <input class="@error('name') is-invalid @enderror" wire:model.debounce.1000ms="name" name="name" type="search" placeholder="عنوان جلسه را وارد کنید">
                    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="type-session">
                    <label for="">نوع جلسه</label>
                    <div class="check-type">
                        <div class="item">
                            <input class="accent" type="checkbox" wire:click="changeSessionState(1)" {{ $session_type==0 ? 'checked' : '' }}>
                            <span>جلسه عمومی</span>
                        </div>
                        <div class="item sec">
                            <input class="accent" type="checkbox" wire:click="changeSessionState(0)" {{ $session_type==1 ? 'checked' : '' }}>
                            <span>جلسه خصوصی</span>
                        </div>
                    </div>
                </div>
                <div class="date-session">
                    <div class="item">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.4167 1.66667H15V1.25C15 0.918479 14.8683 0.600537 14.6339 0.366117C14.3995 0.131696 14.0815 0 13.75 0C13.4185 0 13.1005 0.131696 12.8661 0.366117C12.6317 0.600537 12.5 0.918479 12.5 1.25V1.66667H7.5V1.25C7.5 0.918479 7.3683 0.600537 7.13388 0.366117C6.89946 0.131696 6.58152 0 6.25 0C5.91848 0 5.60054 0.131696 5.36612 0.366117C5.1317 0.600537 5 0.918479 5 1.25V1.66667H4.58333C3.36776 1.66667 2.20197 2.14955 1.34243 3.00909C0.482886 3.86864 0 5.03442 0 6.25L0 15.4167C0 16.6322 0.482886 17.798 1.34243 18.6576C2.20197 19.5171 3.36776 20 4.58333 20H15.4167C16.6322 20 17.798 19.5171 18.6576 18.6576C19.5171 17.798 20 16.6322 20 15.4167V6.25C20 5.03442 19.5171 3.86864 18.6576 3.00909C17.798 2.14955 16.6322 1.66667 15.4167 1.66667ZM15.4167 17.5H4.58333C4.0308 17.5 3.5009 17.2805 3.11019 16.8898C2.71949 16.4991 2.5 15.9692 2.5 15.4167V8.33333H17.5V15.4167C17.5 15.9692 17.2805 16.4991 16.8898 16.8898C16.4991 17.2805 15.9692 17.5 15.4167 17.5Z"
                                fill="black" />
                        </svg>
                        <p>تاریخ جلسه</p>
                        <div class="input_wrapper" >
                            <input id="datepicker1" type="date" wire:keydown="changeinput" placeholder="01/03/1401"  onchange="this.dispatchEvent(new InputEvent('input'))"  wire:model="start_date"  class="time_input @error('start_date') is-invalid @enderror" >

                            
                            @error('start_date') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    
                </div>
                <div class="date-session">
                    <div class="item">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20C7.34784 20 4.8043 18.9464 2.92893 17.0711C1.05357 15.1957 0 12.6522 0 10C0 9.66848 0.131696 9.35054 0.366117 9.11612C0.600537 8.8817 0.918479 8.75 1.25 8.75C1.58152 8.75 1.89946 8.8817 2.13388 9.11612C2.3683 9.35054 2.5 9.66848 2.5 10C2.5 11.4834 2.93987 12.9334 3.76398 14.1668C4.58809 15.4001 5.75943 16.3614 7.12987 16.9291C8.50032 17.4968 10.0083 17.6453 11.4632 17.3559C12.918 17.0665 14.2544 16.3522 15.3033 15.3033C16.3522 14.2544 17.0665 12.918 17.3559 11.4632C17.6453 10.0083 17.4968 8.50032 16.9291 7.12987C16.3614 5.75943 15.4001 4.58809 14.1668 3.76398C12.9334 2.93987 11.4834 2.5 10 2.5C9.66848 2.5 9.35054 2.3683 9.11612 2.13388C8.8817 1.89946 8.75 1.58152 8.75 1.25C8.75 0.918479 8.8817 0.600537 9.11612 0.366117C9.35054 0.131696 9.66848 0 10 0C12.6513 0.00286757 15.1932 1.05736 17.0679 2.9321C18.9426 4.80684 19.9971 7.34871 20 10ZM5.83333 10C5.83333 10.3315 5.96503 10.6495 6.19945 10.8839C6.43387 11.1183 6.75181 11.25 7.08333 11.25H8.90833C9.22493 11.5287 9.63578 11.6763 10.0573 11.6629C10.4789 11.6495 10.8795 11.476 11.1778 11.1778C11.476 10.8795 11.6495 10.4789 11.6629 10.0573C11.6763 9.63578 11.5287 9.22493 11.25 8.90833V5.41667C11.25 5.08515 11.1183 4.7672 10.8839 4.53278C10.6495 4.29836 10.3315 4.16667 10 4.16667C9.66848 4.16667 9.35054 4.29836 9.11612 4.53278C8.8817 4.7672 8.75 5.08515 8.75 5.41667V8.75H7.08333C6.75181 8.75 6.43387 8.8817 6.19945 9.11612C5.96503 9.35054 5.83333 9.66848 5.83333 10ZM5.61667 4.07833C5.86389 4.07833 6.10557 4.00502 6.31113 3.86767C6.51669 3.73032 6.67691 3.5351 6.77152 3.30669C6.86613 3.07828 6.89088 2.82695 6.84265 2.58447C6.79442 2.34199 6.67537 2.11927 6.50055 1.94445C6.32574 1.76963 6.10301 1.65058 5.86053 1.60235C5.61805 1.55412 5.36672 1.57887 5.13831 1.67348C4.9099 1.76809 4.71468 1.92831 4.57733 2.13387C4.43998 2.33943 4.36667 2.58111 4.36667 2.82833C4.36667 3.15985 4.49836 3.4778 4.73278 3.71222C4.9672 3.94664 5.28515 4.07833 5.61667 4.07833ZM2.4275 7.29167C2.67473 7.29167 2.9164 7.21836 3.12196 7.081C3.32752 6.94365 3.48774 6.74843 3.58235 6.52002C3.67696 6.29161 3.70171 6.04028 3.65348 5.7978C3.60525 5.55533 3.4862 5.3326 3.31138 5.15778C3.13657 4.98297 2.91384 4.86392 2.67136 4.81569C2.42889 4.76745 2.17755 4.79221 1.94915 4.88682C1.72074 4.98143 1.52551 5.14164 1.38816 5.3472C1.25081 5.55277 1.1775 5.79444 1.1775 6.04167C1.1775 6.37319 1.3092 6.69113 1.54362 6.92555C1.77804 7.15997 2.09598 7.29167 2.4275 7.29167Z"
                                fill="black" />
                        </svg>
                        <p>زمان جلسه</p>
                        <div class="input_wrapper">
                            <input id="time" type="time"  wire:model="start_time" class="time_input @error('start_time') is-invalid @enderror"  >
                            
                            @error('start_time') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    
                </div>
            </form>
            <div class="box2">
            <div class="inside-box">
            <img src="./client/assets/images/Conference-pana (1) 1.png" width="250" height="250" alt="">
                <p>کنفرانس</p>
                <span style="padding: inherit;">روابط قوی‌تری ایجاد کنید، همکاری‌های فوق‌العاده‌ای ایجاد کنید و تجربه‌ای جذاب از جلسه را با ویدیو و صدای HD برای حداکثر 1000 شرکت‌کننده ایجاد کنید.</span>
                
                </div>
            </div>
        </div>
        @elseif($this->level===2)

        <div class="box-addContact" id="clsModal">
            <div class="box-addContact-container">
                <div class="title">
                    <button class="link-mouse-hover" wire:click="changeToSendMessages">بعدی</button>
                    <div>
                        <select class="dropdown-content link-mouse-hover">
                            @if(!$this->categories==null)
                            <option wire:click.prevent="getAllContacts">همه دسته بندی ها</option>
                                @foreach ($categories as $category)
                                    <option wire:click="selectedCategory({{ $category->id }})" >{{ $category->name }}</option>
                                @endforeach
                            @else
                                <option >دسنه بندی وجود ندارد</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="search">
                    <input wire:keydown="getAllContacts" type="text" wire:model.debounce.1000ms="search" placeholder="جست و جو در مخاطبین">
                    <svg  width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.635 17.8725L15.7637 13.9996C18.6604 10.1286 17.8706 4.64234 13.9996 1.74566C10.1286 -1.15102 4.64234 -0.361187 1.74566 3.50978C-1.15102 7.38076 -0.361187 12.8671 3.50979 15.7637C6.61927 18.0906 10.8901 18.0906 13.9996 15.7637L17.8725 19.6366C18.3592 20.1233 19.1483 20.1233 19.635 19.6366C20.1217 19.1499 20.1217 18.3609 19.635 17.8742L19.635 17.8725ZM8.78697 15.0162C5.34663 15.0162 2.55772 12.2273 2.55772 8.78697C2.55772 5.34663 5.34663 2.55772 8.78697 2.55772C12.2273 2.55772 15.0162 5.34663 15.0162 8.78697C15.0126 12.2257 12.2258 15.0126 8.78697 15.0162Z"
                            fill="#4D4D4D" />
                    </svg>
                </div>
                    <div class="table">
                    <table class="tablecontacts">
                        <tr>
                            <th>انتخاب</th>
                            <th>نام مخاطب</th>
                            <th>شماره موبایل</th>
                            <th>سمت</th>
                            <th>مدرس</th>
                        </tr>
                        @if(!$contacts==null)
                        @foreach($contacts as $contact)
                            <tr>
                                <td>
                                    <input @if ($this->checkContactInSession($contact->id)) checked='checked' @endif class="accent" type="checkbox" wire:click="addUsersToSession({{ $contact->id }})" >
                                </td>
                                <td>
                                    {{ $contact->username }}
                                </td>
                                <td>
                                    {{ $contact->phone }}
                                </td>
                                <td>
                                    {{ $contact->semat }}
                                </td>
                                <td>
                                    <input @if ($this->checkContactIsOstad($contact->id)) checked='checked' @endif wire:click="changeOstadFlag({{ $contact->id }})" name="ostad_flag" class="accent" type="radio">
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <p >کاربری وجود ندارد</p>
                        @endif
                    </table>
                </div>
            </div>
        </div>
        @elseif($this->level===3)
            
        <div class="boxes3">
            <div class="box-one">
                <div class="title-box-one">
                    <p>لیست مخاطبین دعوت شده</p>
                </div>
                <div class="search">
                    <input type="text" wire:model.debounce.1000ms="search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <div class="users-invited">
                    
                    <div class="table selected_contacts">
                    <table class="tablecontacts">
                        <tr>
                            <th>نام و نام خانوادگی</th>
                            <th>شماره تماس </th>
                            <th>سمت</th>
                            <th>وضعیت ارسال پیامک </th>
                        </tr>
                        @if(!$session==null)
                            @foreach ($this->session->contacts as $contact)
                            <tr>
                                <td>{{ $contact->username }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->semat }}</td>
                                <td>  @if ($this->checkSmsSended($contact->id)) <span style="color:green;"> ارسال شده  </span> @else <span style="color:yellow;"> ارسال نشده است </span>  @endif  </td>
                            </tr>
                        @endforeach
                        @else
                            <p >کاربری وجود ندارد</p>
                        @endif
                    </table>
                </div>
                </div>
            </div>
            <div class="box-two" >
                <div class="buttons">
                    <a class="link nth1" target="_blank" href="{{ $this->video_link }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                        </svg>
                        <p>اشتراک گذاری</p>
                    </a>
                    <a class="nth2 link" wire:click="sendMessageToContacts">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <p>ارسال پیام</p>
                    </a>
                </div>
                <div class="img-box-two">
                    <img src="./client/assets/images/Get in touch-amico (1) 1.png" alt="">
                </div>
            </div>
        </div>
        @endif
    </section>

</div>
@endif

</div>
                
            
 