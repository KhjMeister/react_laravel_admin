  <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <div class="layout-page">
    
          <div class="content-wrapper">   

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card app-calendar-wrapper">
                <div class="row g-0">
                  
                  <div class="col app-calendar-sidebar" id="app-calendar-sidebar">
                    <div class="border-bottom p-4 my-sm-0 mb-3">
                      <div class="d-grid">
                        <button class="btn btn-primary btn-toggle-sidebar" data-bs-toggle="offcanvas" data-bs-target="#addEventSidebar" aria-controls="addEventSidebar">
                          <i class="bx bx-plus"></i>
                          <span class="align-middle">افزودن جلسه</span>
                        </button>
                      </div>
                    </div>
                    <div class="p-4">
                      
                      <div class="ms-n2">
                        <div class="inline-calendar"></div>
                      </div>

                      <hr class="container-m-nx my-4">

                      <div class="mb-4">
                        <small class="text-small text-muted text-uppercase align-middle">فیلتر</small>
                      </div>

                      <div class="form-check mb-2 pb-1">
                        <input style="display:none;" class="form-check-input select-all" type="checkbox" id="selectAll" data-value="all" checked>
                        {{-- <label class="form-check-label" for="selectAll">مشاهده همه</label> --}}
                      </div>

                      <div class="app-calendar-events-filter">
                        <div class="form-check form-check-danger mb-2 pb-1">
                          <input class="form-check-input input-filter" type="checkbox" id="select-personal" data-value="personal" checked>
                          <label class="form-check-label" for="select-personal">در حال برگزاری</label>
                        </div>
                        <div class="form-check mb-2 pb-1">
                          <input  class="form-check-input input-filter" type="checkbox" id="select-business" data-value="business" checked>
                          <label class="form-check-label" for="select-business">جلسات تمام شده</label>
                        </div>
                        <div class="form-check form-check-warning mb-2 pb-1">
                          <input style="display:none;" class="form-check-input input-filter" type="checkbox" id="select-family" data-value="family" checked>
                          {{-- <label class="form-check-label" for="select-family">خانواده</label> --}}
                        </div>
                        <div class="form-check form-check-success mb-2 pb-1">
                          <input style="display:none;" class="form-check-input input-filter" type="checkbox" id="select-holiday" data-value="holiday" checked>
                          {{-- <label class="form-check-label" for="select-holiday">تعطیلات</label> --}}
                        </div>
                        <div class="form-check form-check-info">
                          <input style="display:none;" class="form-check-input input-filter" type="checkbox" id="select-etc" data-value="etc" checked>
                          {{-- <label class="form-check-label" for="select-etc">سایر</label> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                  

                  
                  <div class="col app-calendar-content">
                    <div class="card shadow-none border-0">
                      <div class="card-body pb-0">
                        
                        <div id="calendar"></div>
                      </div>
                    </div>
                    <div class="app-overlay"></div>
                   
                    <div class="offcanvas offcanvas-end event-sidebar" tabindex="-1" id="addEventSidebar" aria-labelledby="addEventSidebarLabel">
                      <div class="offcanvas-header border-bottom">
                        <h6 class="offcanvas-title" id="addEventSidebarLabel">افزودن جلسه</h6>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                        <form class="event-form pt-0" id="eventForm" onsubmit="return false">
                          <div class="mb-3">
                            <label class="form-label" for="eventTitle">عنوان جلسه</label>
                            <input type="text" class="form-control" id="eventTitle" name="eventTitle" placeholder="عنوان رویداد">
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="eventLabel1">دسته بندی</label>
                            <select class="select2 select-event-label form-select" id="eventLabel1" name="eventLabel">
                               @if(!$this->categories==null)
                                        @foreach ($categories as $category)
                                            <option  value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @else
                                        <option >دسنه بندی وجود ندارد</option>
                                    @endif
                              
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="eventStartDate">تاریخ شروع</label>
                            <input type="text" class="form-control" id="eventStartDate" name="eventStartDate" placeholder="تاریخ شروع">
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="eventEndDate1">تاریخ پایان</label>
                            <input type="time" class="form-control" id="eventEndDate1" name="eventEndDate" placeholder="ساعت شروع">
                          </div>
                          <div class="mb-3">
                            <label class="switch">
                              <input type="checkbox" class="switch-input allDay-switch">
                              <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                              </span>
                              <span class="switch-label">جلسه خصوصی</span>
                            </label>
                          </div>
                          
                         
                         
                          <div class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                            <div>
                              <button type="submit" class="btn btn-primary btn-add-event me-sm-3 me-1">افزودن</button>
                              <button type="submit" class="btn btn-primary btn-update-event d-none me-sm-3 me-1">
                                به‌روزرسانی
                              </button>
                              <button type="reset" class="btn btn-label-secondary btn-cancel me-sm-0 me-1" data-bs-dismiss="offcanvas">
                                انصراف
                              </button>
                            </div>
                            <div><button class="btn btn-label-danger btn-delete-event d-none">حذف</button></div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            


            <div class="content-backdrop fade"></div>
          </div>
          
        </div>
        
      </div>

     
      <div class="layout-overlay layout-menu-toggle"></div>

     
      <div class="drag-target"></div>
  </div>



<script>
    

    'use strict';
    
    let events =[];
    let date = new Date();
    let nextDay = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
    // prettier-ignore
    let nextMonth = date.getMonth() === 11 ? new Date(date.getFullYear() + 1, 0, 1) : new Date(date.getFullYear(), date.getMonth() + 1, 1);
    // prettier-ignore
    let prevMonth = date.getMonth() === 11 ? new Date(date.getFullYear() - 1, 0, 1) : new Date(date.getFullYear(), date.getMonth() - 1, 1);
    console.log(date);
    let myobj = @js($allsessions);

   
    let notEnded= {
          calendar: 'Personal'
        };
    let ended= {
          calendar: 'Business'
        };
       
    myobj.forEach(element => {
       let event=[];
       let starting = new Date(element.start_date);
        event.id = element.id;
        event.title = element.name;
        event.start = starting;
        event.end = new Date(date.getFullYear(), date.getMonth() + 1, -12);
        event.url = '';
        event.allDay = false;
        if(element.is_ended==0){
          event.extendedProps = notEnded;
        }else{
          event.extendedProps = ended;
        }
       
        events.push(event);
    });

console.log(events);

    {{-- let events = [
      {
        id: 1,
        url: '',
        title: 'بررسی طراحی',
        start: date,
        end: nextDay,
        allDay: false,
        extendedProps: {
          calendar: 'Business'
        }
      },
      {
        id: 2,
        url: '',
        title: 'ملاقات با مشتری',
        start: new Date(date.getFullYear(), date.getMonth() + 1, -11),
        end: new Date(date.getFullYear(), date.getMonth() + 1, -10),
        allDay: true,
        extendedProps: {
          calendar: 'Business'
        }
      },
      {
        id: 3,
        url: '',
        title: 'گردش خانوادگی',
        allDay: true,
        start: new Date(date.getFullYear(), date.getMonth() + 1, -9),
        end: new Date(date.getFullYear(), date.getMonth() + 1, -7),
        extendedProps: {
          calendar: 'Holiday'
        }
      },
      {
        id: 4,
        url: '',
        title: "وقت ویزیت دکتر",
        start: new Date(date.getFullYear(), date.getMonth() + 1, -11),
        end: new Date(date.getFullYear(), date.getMonth() + 1, -10),
        extendedProps: {
          calendar: 'Personal'
        }
      },
      {
        id: 5,
        url: '',
        title: 'بازی دارت؟',
        start: new Date(date.getFullYear(), date.getMonth() + 1, -13),
        end: new Date(date.getFullYear(), date.getMonth() + 1, -12),
        allDay: true,
        extendedProps: {
          calendar: 'ETC'
        }
      },
      {
        id: 6,
        url: '',
        title: 'مدیتیشن',
        start: new Date(date.getFullYear(), date.getMonth() + 1, -13),
        end: new Date(date.getFullYear(), date.getMonth() + 1, -12),
        allDay: true,
        extendedProps: {
          calendar: 'Personal'
        }
      },
      {
        id: 7,
        url: '',
        title: 'شام',
        start: new Date(date.getFullYear(), date.getMonth() + 1, -13),
        end: new Date(date.getFullYear(), date.getMonth() + 1, -12),
        extendedProps: {
          calendar: 'Family'
        }
      },
      {
        id: 8,
        url: '',
        title: 'بررسی محصول',
        start: new Date(date.getFullYear(), date.getMonth() + 1, -13),
        end: new Date(date.getFullYear(), date.getMonth() + 1, -12),
        allDay: true,
        extendedProps: {
          calendar: 'Business'
        }
      },
      {
        id: 9,
        url: '',
        title: 'جلسه ماهانه',
        start: nextMonth,
        end: nextMonth,
        allDay: true,
        extendedProps: {
          calendar: 'Business'
        }
      },
      {
        id: 10,
        url: '',
        title: 'چک‌آپ ماهانه',
        start: prevMonth,
        end: prevMonth,
        allDay: true,
        extendedProps: {
          calendar: 'Personal'
        }
      }
    ]; --}}

</script>
