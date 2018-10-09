import React from 'react';
import { Switch, Route } from 'react-router-dom';

const Main = () => (
    <main>
        <Switch>
            <Route exact path='/users' component={Users}/>
            <Route path='/transactions' component={Transactions}/>
            <Route path='/add_transaction' component={AddTransaction}/>
        </Switch>
    </main>
);

const Users = () => (
    <div>
        <ul>
            <li>6/5 @ Спартак</li>
            <li>6/8 vs Зенит</li>
            <li>6/14 @ Рубин</li>
        </ul>
    </div>
);

const Transactions = () => (
    <div>
        <h1>Добро пожаловать на наш сайт!</h1>
    </div>
);

const AddTransaction = () => (
    <div>
        <h1>Добро пожаловать на наш сайт!</h1>
    </div>
);

export default Main;