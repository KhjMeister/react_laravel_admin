import React  from 'react';
import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';

import './assets/App.css';

import Navbar from './components/layouts/Navbar';
import Sidbar from './components/layouts/Sidbar';
import MobileNavbar from './components/layouts/MobileNavbar';
import MobileSidbar from './components/layouts/MobileSidbar';
import  Alerts  from "./components/layouts/Alerts";

import PrivateRoute from './components/routing/PrivateRoute';

import Dashboard from './components/pages/Dashboard';
import ContactsP from './components/pages/ContactsP';
import Profile from './components/pages/Profile';
import Login from './components/auth/Login';
import Register from './components/auth/Register';

import ContactState from './context/contact/ContactState';
import AuthState from './context/auth/AuthState';
import AlertState from './context/alert/AlertState';
import setAuthToken from './utils/setAuthToken';


if(localStorage.token){
  setAuthToken(localStorage.token);
}



const App = () => {

    return (
      <AuthState>
        <ContactState>
          <AlertState>
            <Router>
            
            
            <div className="panel-layout">
              <MobileNavbar />
              <Sidbar />
              <main>
                  <div className="container">
                     <Navbar />
                          <Alerts />
                          <Switch>
                            <PrivateRoute exact path="/" component={Dashboard} />
                            <PrivateRoute exact path="/profile" component={Profile} />
                            <PrivateRoute exact path="/contacts" component={ContactsP} />
                            <Route exact path="/login" component={Login} />
                            <Route exact path="/register" component={Register} />

                          </Switch>    
                  </div>
              </main>
                <MobileSidbar />
            </div>

          </Router>
        </AlertState>
      </ContactState>
    </AuthState>
    );
  
  
}

export default App;
