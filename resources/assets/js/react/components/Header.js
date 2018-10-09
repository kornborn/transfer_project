import React from 'react';
import { NavLink } from 'react-router-dom'
// import { Nav, NavItem} from 'react-bootstrap';

class Header extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            active: 'users'
        };
        this.handleSelect = this.handleSelect.bind(this);
    }

    handleSelect(e, state) {
        this.setState({ active: state });
    }

    render() {
        return (
            <nav className="navbar navbar-inverse">
                <div id="navbar" className="collapse navbar-collapse">
                    <ul className="nav navbar-nav">
                        <li className={this.state.active === 'users' ? 'active' : ''} onClick={e => this.handleSelect(e, 'users')}>
                            <NavLink to='/users'
                                     >
                                Users
                            </NavLink>
                        </li>
                        <li className={this.state.active === 'transactions' ? 'active' : ''} onClick={e => this.handleSelect(e, 'transactions')}>
                            <NavLink to='/transactions'
                                     >
                                Transactions
                            </NavLink>
                        </li>
                        <li className={this.state.active === 'add_transaction' ? 'active' : ''} onClick={e => this.handleSelect(e, 'add_transaction')}>
                            <NavLink to='/add_transaction'
                                     >
                                Add transaction
                            </NavLink>
                        </li>
                    </ul>
                </div>
            </nav>
        )
    }
}

export default Header;