import React, { useReducer } from 'react';
import AuthContext from './authContext';
import axios from 'axios';
import authReducer from './authReducer';
import setAuthToken from '../../utils/setAuthToken';
import {
    REGISTER_SUCCESS,
    REGISTER_FAIL,
    USER_LOADED,
    AUTH_ERROR,
    LOGIN_SUCCESS,
    LOGIN_FAIL,
    LOGOUT,
    CLEAR_ERRORS
} from '../types';

const Url = 'http://localhost:8000/api/auth';
const AuthState = props =>{
    const initialState = {
       token: localStorage.getItem('token'),
       isAuthenticated: null,
       loading: true,
       error:null,
       user:null 
    };
    
    const [state, dispatch] = useReducer(authReducer, initialState);
    
    // load user
    const loadUser = async () => {
        if(localStorage.token){
            setAuthToken(localStorage.token);
        }
        try {
            const res = await axios.get(Url+'/user-profile');
            dispatch({type:USER_LOADED, payload:res.data})
        } catch (err) {
            dispatch({type:AUTH_ERROR});
        }
    };
    
    // register user
    const register = async formData =>{
        const config = {
            headers:{
                'Content-Type': 'application/json'
            }
        }

        try {
            const res = await axios.post(Url+'/register',formData, config);
            dispatch({
                type:REGISTER_SUCCESS,
                payload:res.data
            });

            loadUser();
        } 
        catch (err) {
            dispatch({
                type:REGISTER_FAIL,
                payload:err.response.data.msg
            });
        }
    }
    
    //login user
    const login = async formData => {
        const config = {
            headers:{
                'Content-Type': 'application/json'
            }
        };
        try {
            const res = await axios.post(Url+'/login',formData, config);
            dispatch({
                type:LOGIN_SUCCESS,
                payload:res.data
            });

            loadUser();
        } catch (err) {
            dispatch({
                type:LOGIN_FAIL,
                payload:err.response.data.msg
            });
        }
    };

    //logout
    const logout = () => {
        dispatch({
            type:LOGOUT
        });
    };

    //clear errors
    const clearErrors = () => dispatch({ type: CLEAR_ERRORS});

   

    
    return  (
        <AuthContext.Provider 
        value={{ 
            token:state.token,
            isAuthenticated:state.isAuthenticated,
            loading:state.loading,
            user:state.user,
            error:state.error,
            register,
            loadUser,
            login,
            logout,
            clearErrors,
          
         }} >
            { props.children }
        </AuthContext.Provider>
    )

};

export default AuthState
