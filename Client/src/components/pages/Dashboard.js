import React, { Fragment, useContext, useEffect} from 'react'
import AuthContext from '../../context/auth/authContext';
import { Link } from 'react-router-dom';
import wellcome from '../../assets/images/undraw.png';



 const Dashboard = () => {
    const authContext =  useContext(AuthContext);
    useEffect(() => {
        authContext.loadUser();
        //eslint-disable-next-line
    }, []);
    return (
        <>
             <div class="content">
                    <section>
                        <img src={wellcome} alt="" />
                        <p>خوش آمدید به <span>ویدیو</span> رایان</p>
                    </section>
                </div>
        </>
    )
}

export default Dashboard