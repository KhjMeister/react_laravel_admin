
<div class="content">
    <section>
        <div class="title">
           <div class="back" wire:click="$emitUp('backToListChild')">
                <p> برگشت </p>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0 12C0 14.3734 0.703789 16.6934 2.02237 18.6668C3.34094 20.6402 5.21508 22.1783 7.4078 23.0865C9.60051 23.9948 12.0133 24.2324 14.3411 23.7694C16.6689 23.3064 18.807 22.1635 20.4853 20.4853C22.1635 18.807 23.3064 16.6689 23.7694 14.3411C24.2324 12.0133 23.9948 9.60051 23.0865 7.4078C22.1783 5.21508 20.6402 3.34094 18.6668 2.02237C16.6934 0.703789 14.3734 0 12 0C8.81846 0.00344086 5.76821 1.26883 3.51852 3.51852C1.26883 5.76821 0.00344086 8.81846 0 12ZM22 12C22 13.9778 21.4135 15.9112 20.3147 17.5557C19.2159 19.2002 17.6541 20.4819 15.8268 21.2388C13.9996 21.9957 11.9889 22.1937 10.0491 21.8078C8.10929 21.422 6.32746 20.4696 4.92893 19.0711C3.53041 17.6725 2.578 15.8907 2.19214 13.9509C1.80629 12.0111 2.00433 10.0004 2.7612 8.17316C3.51808 6.3459 4.7998 4.78412 6.4443 3.6853C8.08879 2.58649 10.0222 2 12 2C14.6513 2.00291 17.1931 3.05741 19.0678 4.93215C20.9426 6.80688 21.9971 9.34873 22 12Z"
                        fill="#666666" />
                    <path
                        d="M16 11.9995C16.0007 12.7315 15.7332 13.4384 15.248 13.9865C14.957 14.3135 14.674 14.6235 14.471 14.8265L11.647 17.6995C11.4588 17.8763 11.2095 17.9735 10.9513 17.9706C10.6931 17.9678 10.446 17.8652 10.2617 17.6843C10.0775 17.5034 9.97031 17.2582 9.96272 17.0001C9.95513 16.742 10.0477 16.4909 10.221 16.2995L13.05 13.4195C13.237 13.2315 13.491 12.9515 13.75 12.6605C13.9111 12.4778 14.0001 12.2426 14.0001 11.999C14.0001 11.7554 13.9111 11.5202 13.75 11.3375C13.492 11.0475 13.238 10.7675 13.057 10.5855L10.221 7.69952C10.0477 7.50811 9.95513 7.25706 9.96272 6.99895C9.97031 6.74084 10.0775 6.49567 10.2617 6.31476C10.446 6.13386 10.6931 6.03124 10.9513 6.0284C11.2095 6.02556 11.4588 6.12272 11.647 6.29952L14.476 9.17752C14.676 9.37752 14.956 9.68452 15.245 10.0105C15.732 10.5585 16.0007 11.2664 16 11.9995Z"
                        fill="#666666" />
                </svg>
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
                {{-- <div class="type-session">
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
                </div> --}}
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
                            <input id="datepicker1" type="text"  placeholder="01/03/1401"  onchange="this.dispatchEvent(new InputEvent('input'))"  wire:model="start_date"  class="time_input @error('start_date') is-invalid @enderror" >

                            
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
                <span style="padding: inherit;color: var(--body-300);padding: 30px;">روابط قوی‌تری ایجاد کنید، همکاری‌های فوق‌العاده‌ای ایجاد کنید و تجربه‌ای جذاب از جلسه را با ویدیو و صدای HD برای حداکثر 1000 شرکت‌کننده ایجاد کنید.</span>
                
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
                        <p> لینک جلسه</p>
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

