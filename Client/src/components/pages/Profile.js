import React, {  useContext, useEffect} from 'react';
import AuthContext from '../../context/auth/authContext';
import '../../assets/css/profile.css';
import profileImage from '../../assets/images/petyerheadshot7744252d68dc7099fb9dc016e4bbd540_thumb 5.png';


 const Profile = () => {
     const authContext =  useContext(AuthContext);
     useEffect(() => {
         authContext.loadUser();
         //eslint-disable-next-line
     }, []);
    return (
        <>
            <div className="content">
                <section>
                    <div className="detail-profile">
                        <div className="img-profile">
                            <img src={profileImage} alt="" />
                        </div>
                        <form action="" method="post">
                            <div className="form-group">
                                <div className="item-form-group">
                                    <label for="نام">نام</label>
                                    <input type="text" placeholder="علی" />
                                </div>
                                <div className="item-form-group">
                                    <label for="نام و نام خانوادگی">نام و نام خانوادگی</label>
                                    <input type="text" placeholder="ریکی" />
                                </div>
                            </div>
                            <div className="item-form-group full-with">
                                <label for="پست الکترونیک">پست الکترونیک</label>
                                <input type="text" placeholder="aliriki@gmail.com" />
                            </div>
                            <div className="form-group responsive-flex">
                                <div className="item-form-group">
                                    <label for="شماره موبایل">شماره تماس</label>
                                    <input type="text" placeholder="09******95" />
                                </div>
                                <div className="item-form-group">
                                    <label for="کلمه عبور">کلمه عبور</label>
                                    <input type="text" placeholder="************" />
                                </div>
                            </div>
                            <button type="submit">ویرایش</button>
                        </form>
                    </div>
                </section>
            </div>
        </>
    )
}

export default Profile