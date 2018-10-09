import React from 'react';
import ReactDOM from 'react-dom';
import { Nav, NavItem, NavDropdown, MenuItem } from 'react-bootstrap';

class Navbar extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            active: 1
        };
        this.handleSelect = this.handleSelect.bind(this);
    }

    handleSelect(selectedKey, e) {
        e.preventDefault();
        this.setState({ active: selectedKey });
    }

    render() {
        return (
            <Nav bsStyle="tabs" activeKey={ this.state.active } onSelect={this.handleSelect}>
                <NavItem eventKey="1" href="/users">
                    Users
                </NavItem>
                <NavItem eventKey="2" href="/transactions">
                    Transactions
                </NavItem>
                <NavItem eventKey="3" href="/add_transaction">
                    Add transaction
                </NavItem>
            </Nav>
        );
    }
}

export default Navbar;