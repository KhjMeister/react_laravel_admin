import React, { useReducer } from 'react';

import CategoryContext from './categoryContext';
import CategoryReducer from './categoryeducer';
import axios  from 'axios';
import {
    GET_CATEGORIES,
} from '../types';

const Url = "http://localhost:8000/api/auth";

const CategoryState = props =>{
    const initialState = {
        categories:null,
  
    };

    const [state, dispatch] = useReducer(CategoryReducer, initialState);

    // get Contacts
    const getCategory = async () =>{
        
        try {
            const res = await axios.get(Url+'/category')
            dispatch({ type: GET_CATEGORIES, payload: res.data});
        } catch (err) {
            // dispatch({type:CONTACT_ERROR,payload:err.data})
        }
    };

    return  (
        <CategoryContext.Provider 
        value={{ 
            categories:state.category,
            getCategory,
         }} >
            { props.children }
        </CategoryContext.Provider>
    )

};

export default CategoryState
