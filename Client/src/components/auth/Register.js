import React,{ Fragment, useState,useContext,useEffect} from 'react'
import AlertContext from '../../context/alert/alertContext';
import AuthContext from '../../context/auth/authContext';

const Register = props => {
    const alertContext = useContext(AlertContext);
    const authContext = useContext(AuthContext);

    const{setAlert} = alertContext;
    const{register, error,clearErrors,isAuthenticated } = authContext;

    useEffect(() => {
        if(isAuthenticated){
            props.history.push('/');
        }
            if(error==="ایمیل قبلا برای کاربر دیگری ثبت شده"){
                setAlert(error,'danger');
                clearErrors();
        }
        //eslint-disable-next-line
    }, [error,isAuthenticated,props.history]);

    const [user,setUser]= useState({
        name:'',
        phone:'',
        username:'',
        email:'',
        password:'',
        password_confirmation:''
    });
    const { name,phone,username,email,password,password_confirmation } = user;


    const onChange = e =>{
        setUser({
            ...user,[e.target.name]:e.target.value
        });
    }
    const onSubmit = e =>{
        e.preventDefault();
        if(name===''||phone===''||username===''||email===''||password===''){
            setAlert('لطفا تمام موارد را پر کنید','danger');
        }else if(password !== password_confirmation){
            setAlert('پسورد ها مشابه نیستند','danger');
        }else {
            register({
                name,
                phone,
                username,
                email,
                password,
                password_confirmation
            });

        }
    }

    return (
        <Fragment>
                            
        <div className="row">

            <div className="col-lg-12 col-xlg-12 col-md-12">
                <div className="card">
                    <div className="card-header" >
                        <h4 className=" card-title "> ثبت نام </h4>
                    </div>
                    <div className="card-body">
                        <form className="form-horizontal form-material" onSubmit={onSubmit}>
                            <div className="form-group">
                                <label htmlFor="name" className="col-md-12">نام</label>
                                <div className="col-md-12">
                                    <input type="text" id="name" name="name" value={name} onChange={onChange} required placeholder="نام خود را وارد کنید" className="form-control form-control-line" />
                                </div>
                            </div>
                            <div className="form-group">
                                <label htmlFor="username" className="col-md-12"> نام کاربری </label>
                                <div className="col-md-12">
                                    <input type="text" id="username" name="username" value={username} onChange={onChange} required placeholder="نام خود را وارد کنید" className="form-control form-control-line" />
                                </div>
                            </div>
                            <div className="form-group">
                                <label htmlFor="phone" className="col-md-12">  شماره تلفن  </label>
                                <div className="col-md-12">
                                    <input type="text" id="phone" name="phone" value={phone} onChange={onChange} required placeholder=" ماره تلفن  " className="form-control form-control-line" />
                                </div>
                            </div>
                            <div className="form-group">
                                <label htmlFor="email" className="col-md-12">ایمیل</label>
                                <div className="col-md-12">
                                    <input id="email" name="email" value={email}  onChange={onChange} type="email" required placeholder="ایمیل خود را وارد کنید" className="form-control form-control-line"   />
                                </div>
                            </div>
                            <div className="form-group">
                                <label htmlFor="password" className="col-md-12">پسورد</label>
                                <div className="col-md-12">
                                    <input id="password" name="password" value={password} onChange={onChange} type="password" required placeholder="پسورد خود را وارد کنید"  className="form-control form-control-line" />
                                </div>
                            </div>
                            <div className="form-group">
                                <label htmlFor="password_confirmation" className="col-md-12">تایید پسورد</label>
                                <div className="col-md-12">
                                    <input id="password_confirmation" name="password_confirmation" value={password_confirmation} onChange={onChange} type="password" required placeholder="پسورد خود را دوباره وارد کنید" className="form-control form-control-line"/>
                                </div>
                            </div>
                            
                            
                            <div className="form-group">
                                <div className="col-sm-12">
                                    <button type="submit" className="btn btn-outline-success">ثبت نام</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
</Fragment>
)
}

export default Register
