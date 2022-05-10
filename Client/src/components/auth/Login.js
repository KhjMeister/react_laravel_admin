import React,{Fragment,useState,useContext,useEffect} from 'react'
import AlertContext from '../../context/alert/alertContext';
import AuthContext from '../../context/auth/authContext';

import descktopLoginPic from '../../assets/images/IMG-20210104-WA0002 1.jpg';
import mobileLoginPic from '../../assets/images/mobilelogin.jpg';
import '../../assets/css/login.css';

const Login = props => {
    const alertContext = useContext(AlertContext);
    const authContext = useContext(AuthContext);

    const{setAlert} = alertContext;
    const{login, error,clearErrors,isAuthenticated } = authContext;

    useEffect(() => {
        if(isAuthenticated){
            props.history.push('/');
        }
            if(error==="ایمیل یا رمز اشتباه است"){
                setAlert(error,'danger');
                clearErrors();
        }
        //eslint-disable-next-line
    }, [error,isAuthenticated,props.history]);

    const [user,setUser]= useState({
        email:'',
        password:''
    });
    const {email,password} = user;

    const onChange = e =>{
        setUser({
            ...user,[e.target.name]:e.target.value
        });
    };
    const onSubmit = e =>{
        e.preventDefault();
        if (email===''||password==='') {
            setAlert('لطفا موارد خالی را پر کنید','danger');
        }else{
            login({
                email,
                password
            });
        }
    };
    return (
        <>
         <div className="login_content">
            <div className="img-login">
                <img className="descktop" src={descktopLoginPic} alt="" />
                <img className="mobile" src={mobileLoginPic} alt="" />
            </div>
            <div className="form-login">
                <div className="items">
                    <div className="detail">
                        <h1>خوش آمدید</h1>
                        <span>به ویدیو رایان</span>
                        <p>
                            ویدیو رایان وبسایتی برای ایجاد کنفرانس ها و وبینار
                            <br /> مدیریت دسته بندی ها
                            <br />
                            مدیریت کاربران
                            <br />
                            مدیریت جلسات
                            <br />
                        </p>
                    </div>
                    <form  onSubmit={onSubmit}>
                        <div className="form-group">
                            <label for="email">ایمیل </label>
                            <input id="email" name="email" value={email} onChange={onChange} required type="email" placeholder=" ایمیل خود را وارد کنید" />
                        </div>
                        <div className="form-group">
                            <label for="password">کلمه عبور</label>
                            <input id="password" name="password" value={password} required onChange={onChange} type="password" placeholder="پسورد خود را وارد کنید"  />
                        </div>
                        <button type="submit"> ورود </button>
                    </form>
                </div>
            </div>
            <div className="after_login">
            </div> 
        </div>
        

</>
    )
}

export default Login
