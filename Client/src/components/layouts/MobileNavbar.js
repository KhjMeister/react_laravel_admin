import React,{ useContext } from 'react';
import PropTypes from 'prop-types';
import { Link } from 'react-router-dom';
import AuthContext from '../../context/auth/authContext';
import ContactContext from '../../context/contact/contactContext';

 const MobileNavbar = ({title }) => {
    const authContext =  useContext(AuthContext);
    const contactContext =  useContext(ContactContext);

    const {isAuthenticated,logout }= authContext;
    const {clearContacts }= contactContext;

    const onLogout = ()=> {
        logout();
        clearContacts();
    }

    const authLinks = (
        <>
                <div className="navmobile">
                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"
                      id="btn-menu">
                      <rect width="32" height="32" rx="8" fill="white" />
                      <line x1="8" y1="10" x2="24" y2="10" stroke="black" stroke-width="2" stroke-linecap="round" />
                      <path d="M16 20.534L24.2174 20.5343" stroke="black" stroke-width="2" stroke-linecap="round" />
                      <path d="M8 15.2184L23.9739 15.2284" stroke="black" stroke-width="2" stroke-linecap="round" />
                  </svg>

                  <div className="navmobile-logo">
                      <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" >
                          <rect width="32" height="32" fill="url(#pattern0)" />
                          <defs>
                              <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                  <use xlinkHref="#image0_129_133" transform="translate(-0.00409836) scale(0.00819672)" />
                              </pattern>
                              <image id="image0_129_133" width="123" height="122" xlinkHref="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHsAAAB6CAYAAACfmyzaAAAACXBIWXMAABJ0AAASdAHeZh94AAAKjGlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNi4wLWMwMDIgNzkuMTY0NDYwLCAyMDIwLzA1LzEyLTE2OjA0OjE3ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnRpZmY9Imh0dHA6Ly9ucy5hZG9iZS5jb20vdGlmZi8xLjAvIiB4bWxuczpleGlmPSJodHRwOi8vbnMuYWRvYmUuY29tL2V4aWYvMS4wLyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgMjEuMiAoV2luZG93cykiIHhtcDpDcmVhdGVEYXRlPSIyMDIwLTEwLTE4VDEwOjA5OjI2KzAzOjMwIiB4bXA6TWV0YWRhdGFEYXRlPSIyMDIwLTExLTIzVDEzOjAzOjQ2KzAzOjMwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAyMC0xMS0yM1QxMzowMzo0NiswMzozMCIgcGhvdG9zaG9wOkNvbG9yTW9kZT0iMyIgcGhvdG9zaG9wOklDQ1Byb2ZpbGU9InNSR0IgSUVDNjE5NjYtMi4xIiBkYzpmb3JtYXQ9ImltYWdlL3BuZyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDozM2E3MjNjZC0wNWJjLWJjNDUtYTZlYi1iYzVkYjliNzVjMDUiIHhtcE1NOkRvY3VtZW50SUQ9ImFkb2JlOmRvY2lkOnBob3Rvc2hvcDo1NDViMGVkNC02NTYzLTA5NDgtYjMzMC1lYTU5MDM3MGYwZGQiIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDphMDgwMmI4ZC0wYzkzLWZmNDEtOWQ3MS1lZmU1ZDQwNTA2YjkiIHRpZmY6T3JpZW50YXRpb249IjEiIHRpZmY6WFJlc29sdXRpb249IjEyMDAwMDAvMTAwMDAiIHRpZmY6WVJlc29sdXRpb249IjEyMDAwMDAvMTAwMDAiIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiIGV4aWY6Q29sb3JTcGFjZT0iMSIgZXhpZjpQaXhlbFhEaW1lbnNpb249IjUwMCIgZXhpZjpQaXhlbFlEaW1lbnNpb249IjUwMCI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6YTA4MDJiOGQtMGM5My1mZjQxLTlkNzEtZWZlNWQ0MDUwNmI5IiBzdEV2dDp3aGVuPSIyMDIwLTEwLTE4VDEwOjA5OjI2KzAzOjMwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjEuMiAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOmVmM2I4MjAxLTFmZGYtYmU0MC1hYzFiLTc0YzM5NWNmMjI4ZSIgc3RFdnQ6d2hlbj0iMjAyMC0xMC0xOFQxMDo0Njo0MSswMzozMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIDIxLjIgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJjb252ZXJ0ZWQiIHN0RXZ0OnBhcmFtZXRlcnM9ImZyb20gYXBwbGljYXRpb24vdm5kLmFkb2JlLnBob3Rvc2hvcCB0byBpbWFnZS9wbmciLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImRlcml2ZWQiIHN0RXZ0OnBhcmFtZXRlcnM9ImNvbnZlcnRlZCBmcm9tIGFwcGxpY2F0aW9uL3ZuZC5hZG9iZS5waG90b3Nob3AgdG8gaW1hZ2UvcG5nIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDo4ODE1OWMxZS0yZWQ2LTBmNGItYmMwZC0wZTA3YTFkYWM4MDUiIHN0RXZ0OndoZW49IjIwMjAtMTAtMThUMTA6NDY6NDErMDM6MzAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCAyMS4yIChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6MzNhNzIzY2QtMDViYy1iYzQ1LWE2ZWItYmM1ZGI5Yjc1YzA1IiBzdEV2dDp3aGVuPSIyMDIwLTExLTIzVDEzOjAzOjQ2KzAzOjMwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjEuMiAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPC9yZGY6U2VxPiA8L3htcE1NOkhpc3Rvcnk+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOmVmM2I4MjAxLTFmZGYtYmU0MC1hYzFiLTc0YzM5NWNmMjI4ZSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDphMDgwMmI4ZC0wYzkzLWZmNDEtOWQ3MS1lZmU1ZDQwNTA2YjkiIHN0UmVmOm9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDphMDgwMmI4ZC0wYzkzLWZmNDEtOWQ3MS1lZmU1ZDQwNTA2YjkiLz4g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" />
                          </defs>
                      </svg>
                      <p>ویدیو <span>رایان</span></p>
                  </div>
                  <div className="navmobile-profile">
                      <img src="https://picsum.photos/200" alt="" />
                      <p>علی ریکی</p>
                  </div>
              </div>
        </>
    );
    const guestLinks = (
        <>
           
        </>
    );

    return (
        <>
            {isAuthenticated ? authLinks : guestLinks}  
        </>
    )
}

MobileNavbar.propTypes = {
    title:PropTypes.string.isRequired
}
MobileNavbar.defaultProps = {
    title: 'مدیریت تماس ها'
}
export default MobileNavbar
