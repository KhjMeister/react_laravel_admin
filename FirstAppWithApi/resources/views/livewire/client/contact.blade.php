<div class="content">
    <section>
        <div class="contacts-detail">
            <div class="item-contacts">
                <h5>مخاطبین</h5>
                
                <select style="width:180px;background-color:#f7f7f7;font-size:15px;" class="dropdown-content link-mouse-hover">
                    @if(!$this->categories==null)
                    <option wire:click="getAllContacts">همه دسته بندی ها</option>
                        @foreach ($categories as $category)
                            <option wire:click="selectedCategory({{ $category->id }})" >{{ $category->name }}</option>
                        @endforeach
                    @else
                        <option >دسنه بندی وجود ندارد</option>
                    @endif
                </select>

            <div class="item-detail">
                    <button wire:click="resetForm" class="btn-contacts" id="myBtn" >
                        اضافه کردن
                    </button>
                    <div wire:ignore.self id="myModal" class="modal">
                        <div class="modal-content">
                            <span class="closecreate close">&times;</span>
                            <form wire:submit.prevent="storeContact" class="form-group">
                                <div > 
                                    <label  for="fullname">نام و نام خانوادگی:</label>
                                    <input wire:model="username" class="@error('username') is-invalid @enderror" type="text" placeholder="نام و نام خانوادگی را وارد کنید">
                                    @error('username') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div> 
                                <label for="fullname">شماره موبایل:</label>
                                <input wire:model="phone" class="@error('phone') is-invalid @enderror" type="text" placeholder="شماره موبایل را وارد کنید">
                                @error('phone') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>


                            <div class="dropdown">
                                <label  for="fullname">عنوان دسته</label>
                                <select wire:model="ca_id" id="categoryFormDropdown"  class="@error('ca_id') is-invalid @enderror dropdown-content ">
                                    @if(!$this->categories==null)
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @else
                                        <option >دسنه بندی وجود ندارد</option>
                                    @endif
                                </select>
                                @error('ca_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                            <div> 
                                <label for="fullname">سمت</label>
                                <input wire:model="semat" class="@error('semat') is-invalid @enderror" type="text" placeholder="سمت را مشخص نمایید">
                                @error('semat') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn-form">
                                    اضافه کردن مخاطب
                            </button>

                        </form>

                    </div>
                    </div>
                    
            </div>
            <div class="item-detail">
                    
                <div wire:ignore.self id="myModalEditeCntact" class="modal" >
                        <div class="modal-content">
                            <span class="closecreate close">&times;</span>
                            <form wire:submit.prevent="updateContact" class="form-group">
                                <div > 
                                    <label  for="fullname">نام و نام خانوادگی:</label>
                                    <input wire:model="username" class="@error('username') is-invalid @enderror" type="text" placeholder="نام و نام خانوادگی را وارد کنید">
                                    @error('username') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div> 
                                <label  for="fullname">شماره موبایل:</label>
                                <input wire:model="phone" class="@error('phone') is-invalid @enderror" type="text" placeholder="شماره موبایل را وارد کنید">
                                @error('phone') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>


                            <div class="dropdown">
                                <label  for="fullname">عنوان دسته</label>
                                <select wire:model="ca_id" id="categoryFormDropdown" class="@error('ca_id') is-invalid @enderror dropdown-content">
                                    @if(!$this->categories==null)
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @else
                                        <option >دسنه بندی وجود ندارد</option>
                                    @endif
                                </select>
                                @error('ca_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                            <div> 
                                <label for="fullname">سمت</label>
                                <input wire:model="semat" class="@error('semat') is-invalid @enderror" type="text" placeholder="سمت را مشخص نمایید">
                                @error('semat') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn-form">
                                    ویرایش مخاطب
                            </button>

                            </form>

                    </div>
                    </div>
                    
            </div>
            
            <div class="item-search" style="position: relative;">
                <input wire:keydown="getAllContacts" wire:model="search" type="search" class="search" placeholder="جستجو در مخاطبین ....">
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.635 17.8725L15.7637 13.9996C18.6604 10.1286 17.8706 4.64234 13.9996 1.74566C10.1286 -1.15102 4.64234 -0.361187 1.74566 3.50978C-1.15102 7.38076 -0.361187 12.8671 3.50979 15.7637C6.61927 18.0906 10.8901 18.0906 13.9996 15.7637L17.8725 19.6366C18.3592 20.1233 19.1483 20.1233 19.635 19.6366C20.1217 19.1499 20.1217 18.3609 19.635 17.8742L19.635 17.8725ZM8.78697 15.0162C5.34663 15.0162 2.55772 12.2273 2.55772 8.78697C2.55772 5.34663 5.34663 2.55772 8.78697 2.55772C12.2273 2.55772 15.0162 5.34663 15.0162 8.78697C15.0126 12.2257 12.2258 15.0126 8.78697 15.0162Z" fill="#4D4D4D"/>
                        </svg>
            
            </div>
        </div>
    </section>
    @if(!$contacts_visablity)
    <div class="create-grouping">
        <img src="./client/assets/images/Shared workspace-rafiki 1.png" class="img-contacts">
        <h6>قبل از ایجاد مخاطب دسته بندی خود را درست کنید</h6>
        <br>
        <a href="/category" class="btn-create-Grouping">
                ساخت دسته بندی
        </a>
    </div>
    @elseif($contacts_visablity)
    <div class="table">
        <table class="tablecontacts">
            <tr>
                <th>نام مخاطبین</th>
                <th>شماره موبایل</th>
                <th>دسته بندی</th>
                <th>سمت</th>
                <th>ویرایش مخاطب</th>
                <th>حذف مخاطب</th>
            </tr>
            @foreach($contacts as $contact)
                <tr>
                    <td>
                            {{ $contact->username }}
                    </td>

                    <td>
                    {{ $contact->phone }}
                    </td>
                    <td>
                    {{ $this->getCategory($contact->ca_id) }}
                    </td>
                    <td>
                    {{ $contact->semat }}
                    </td>
                    <td>
                        <svg wire:click="editeContact({{$contact->id}})" class="myBtnEditeContact link-mouse-hover"  width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.6686 1.3073C16.1271 0.78915 15.407 0.5 14.6581 0.5C13.9092 0.5 13.1891 0.78915 12.6477 1.3073L0.5 13.4731V17.5H4.52089L16.6686 5.33419C17.201 4.79978 17.5 4.07568 17.5 3.32075C17.5 2.56582 17.201 1.84171 16.6686 1.3073ZM3.64105 15.3716H2.6252V14.3543L11.5886 5.37818L12.6045 6.39483L3.64105 15.3716Z" fill="#888888"/>
                        </svg>
                        
                    </td>

                    <td>
                        <svg wire:click="deleteContact({{ $contact->id }})" class="link-mouse-hover" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 6.375C21 5.75368 20.4505 5.25 19.7727 5.25H16.6833C16.1663 3.90552 14.7824 3.00457 13.2273 3H10.7727C9.21759 3.00457 7.83372 3.90552 7.31673 5.25H4.22727C3.54947 5.25 3 5.75368 3 6.375C3 6.99632 3.54947 7.5 4.22727 7.5H4.63637V16.875C4.63637 19.1532 6.65109 21 9.13636 21H14.8636C17.3489 21 19.3636 19.1532 19.3636 16.875V7.5H19.7727C20.4505 7.5 21 6.99632 21 6.375ZM16.9091 16.875C16.9091 17.9105 15.9933 18.75 14.8636 18.75H9.13636C8.00669 18.75 7.09092 17.9105 7.09092 16.875V7.5H16.9091V16.875Z" fill="#F51100"/>
                            <path d="M9.95457 16.5C10.6324 16.5 11.1818 15.9963 11.1818 15.375V10.875C11.1818 10.2537 10.6324 9.75 9.95457 9.75C9.27677 9.75 8.72729 10.2537 8.72729 10.875V15.375C8.72729 15.9963 9.27677 16.5 9.95457 16.5Z" fill="#F51100"/>
                            <path d="M14.0454 16.5C14.7232 16.5 15.2727 15.9963 15.2727 15.375V10.875C15.2727 10.2537 14.7232 9.75 14.0454 9.75C13.3676 9.75 12.8182 10.2537 12.8182 10.875V15.375C12.8182 15.9963 13.3676 16.5 14.0454 16.5Z" fill="#F51100"/>
                        </svg>
                        
                    </td>
                </tr>
            @endforeach

            
            
        </table>
    </div>
    @endif
    

</div>
