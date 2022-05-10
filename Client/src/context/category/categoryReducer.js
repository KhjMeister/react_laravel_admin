import { 
    GET_CATEGORIES,
} from "../types";
 //eslint-disable-next-line
export default(state,action) =>{
    switch (action.type) {
        case GET_CATEGORIES:
            return{
                ...state,
                category: action.payload,
                loading:false
            };
        default:
            return state;
    }
}