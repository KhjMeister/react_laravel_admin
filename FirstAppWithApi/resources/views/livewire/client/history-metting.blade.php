<div class="content" >
    @if($editSessionFlag==False)
    <section>
        <div class="historymeeting-detail">
            <div class="item-historymeeting">
                <h5>لیست جلسات فعال</h5>
                
                
                    <button class="{{ $this->descAsc ? 'btn-historymeeting2 link-mouse-hover' : 'btn-historymeeting' }} " wire:click="getSessionsByAscOrDesc('desc')">
                        جدیدترین
                    </button>
                    <button class="{{ $this->descAsc ? 'btn-historymeeting' : 'btn-historymeeting2 link-mouse-hover' }}" wire:click="getSessionsByAscOrDesc('asc')">
                        قدیمی ترین
                    </button>
                
            </div>
            <div class="item-search" style="position: relative;">
                <input wire:model="search" type="search" class="search" placeholder="جست وجو در جلسات ....">
                    <svg wire:click="getAllSession" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.635 17.8725L15.7637 13.9996C18.6604 10.1286 17.8706 4.64234 13.9996 1.74566C10.1286 -1.15102 4.64234 -0.361187 1.74566 3.50978C-1.15102 7.38076 -0.361187 12.8671 3.50979 15.7637C6.61927 18.0906 10.8901 18.0906 13.9996 15.7637L17.8725 19.6366C18.3592 20.1233 19.1483 20.1233 19.635 19.6366C20.1217 19.1499 20.1217 18.3609 19.635 17.8742L19.635 17.8725ZM8.78697 15.0162C5.34663 15.0162 2.55772 12.2273 2.55772 8.78697C2.55772 5.34663 5.34663 2.55772 8.78697 2.55772C12.2273 2.55772 15.0162 5.34663 15.0162 8.78697C15.0126 12.2257 12.2258 15.0126 8.78697 15.0162Z" fill="#4D4D4D"/>
                    </svg>
            </div>
        </div>
    </section>
    <div class="table">
        <table class="tablehistorymeeting">
            <tr>
                <th>شماره جلسه</th>
                <th>عنوان جلسه</th>
                <th>تاریخ جلسه</th>
                <th>لیست حاضرین</th>
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
                        {{ $sess->start_time }} 
                    </td>
                    <td>
                        <svg wire:click="editeSessionContacts({{$sess->id}})" class="link-mouse-hover" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.85 8.61834C17.7525 8.35659 15.375 2.21484 9 2.21484C2.625 2.21484 0.2445 8.35659 0.15 8.61834L0 9.00984L0.15 9.40134C0.2475 9.66309 2.625 15.8048 9 15.8048C15.375 15.8048 17.7555 9.66309 17.85 9.40134L18 9.00984L17.85 8.61834ZM9 13.5736C4.9365 13.5736 2.96925 10.1881 2.4075 9.00984C2.97075 7.82859 4.93875 4.44609 9 4.44609C13.0612 4.44609 15.0285 7.82784 15.5925 9.00984C15.0285 10.1918 13.0612 13.5736 9 13.5736Z" fill="#777777"/>
                            <path d="M9 12.0098C10.6569 12.0098 12 10.6666 12 9.00977C12 7.35291 10.6569 6.00977 9 6.00977C7.34315 6.00977 6 7.35291 6 9.00977C6 10.6666 7.34315 12.0098 9 12.0098Z" fill="#777777"/>
                        </svg>
                    </td>
                    <td>
                        <svg  class="link-mouse-hover"  width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
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
    @else
    <div class="box-addContact" id="clsModal">
        <div class="box-addContact-container">
            <div class="title">
                <button class="button link-mouse-hover" wire:click="backTosessionList">برگشت</button>
                <div>
                    
                </div>
            </div>
            
                <div class="table">
                <table class="tablecontacts">
                    <tr>
                        <th>نام مخاطب</th>
                        <th>شماره موبایل</th>
                        <th>سمت</th>
                        <!-- <th>مدرس</th> -->
                    </tr>
                    @if(!$this->session->contacts==null)
                    @foreach($this->session->contacts as $contact)
                        <tr>
                            
                            <td>
                                {{ $contact->username }}
                            </td>
                            <td>
                                {{ $contact->phone }}
                            </td>
                            <td>
                                {{ $contact->semat }}
                            </td>
                            <!-- <td>
                                <input wire:init="funOstadFlag({{$contact->id}})" disabled {{ $this->ostadFlag ? 'checked' : '' }}  name="ostad_flag" class="accent" type="radio">
                            </td> -->
                            
                        </tr>
                    @endforeach
                    @else
                        <p >کاربری وجود ندارد</p>
                    @endif
                </table>
            </div>
        </div>
    </div>
    @endif
</div>

                
            
 