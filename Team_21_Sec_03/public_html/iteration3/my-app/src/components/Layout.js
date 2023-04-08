import React from 'react';
import { Navbar, Nav, NavDropdown, Container } from 'react-bootstrap';
import { Link, Outlet } from 'react-router-dom';

function Layout(props) {
    return (
        <>
            <Navbar collapseOnSelect bg="light" expand="lg" variant="light">
                <Container>
                    <Navbar.Brand href="/">
                        <b>E-Commerce</b> Site
                    </Navbar.Brand>
                    <Navbar.Toggle aria-controls="navbar-nav" />
                    <Navbar.Collapse id="navbar-nav">
                        <Nav className="me-auto">
                            <NavDropdown title="Category" id="nav-dropdown">
                                <NavDropdown.Item href="#">Category 1</NavDropdown.Item>
                                <NavDropdown.Item href="#">Category 2</NavDropdown.Item>
                                <NavDropdown.Item href="#">Category 3</NavDropdown.Item>
                            </NavDropdown>
                            <Link to="/about" className="nav-link">
                                About Us
                            </Link>
                            <Link to="/contact" className="nav-link">
                                Contact Us
                            </Link>
                            <Link to="/ServiceC" className="nav-link">
                                Types of Services
                            </Link>
                            <Link to="/Admin" className="nav-link">
                                Admin Mode
                            </Link>
                            <NavDropdown title="DB Maintain" id="nav-dropdown">
                                <Link to="/Admin" className="dropdown-item">
                                    Insert
                                </Link>
                                <Link to="/delete" className="dropdown-item">
                                    Delete
                                </Link>
                                <Link to="/select" className="dropdown-item">
                                    Select
                                </Link>
                                <Link to="/update" className="dropdown-item">
                                    Update
                                </Link>
                            </NavDropdown>
                        </Nav>
                        <Nav>
                            <Nav>
                                <li><Link to="/SignIn" className="nav-link">SignIn</Link></li>
                                <Link to="/SignUp" className="nav-link">Register</Link>
                            </Nav>
                            <Nav>
                                <Link to="/Shopping"  className="nav-link">
                                    <i class="fa fa-shopping-cart" ></i>
                                </Link>
                                <NavDropdown title="Account" id="basic-nav-dropdown">
                                    <NavDropdown.Item href="/profile">Profile</NavDropdown.Item>
                                    <NavDropdown.Item href="/orders">Orders</NavDropdown.Item>
                                    <NavDropdown.Item href="/Payment">Payment Method</NavDropdown.Item>
                                    <NavDropdown.Item href="/Review">Reviews</NavDropdown.Item>
                                    <NavDropdown.Divider />
                                    <NavDropdown.Item href="/" onClick={null}>Logout</NavDropdown.Item>
                                </NavDropdown>
                            </Nav>
                        </Nav>
                    </Navbar.Collapse>
                </Container>
            </Navbar>
            <Outlet />
        </>
    );
}

/*
will replace right corner to conditional render login register and profile shopping cart
<Nav>
                            
    {props.loggedIn ? (
        <Nav>
            <Link to="/Shopping"  className="nav-link">
                <i class="fa fa-shopping-cart" ></i>
            </Link>
            <NavDropdown title="Account" id="basic-nav-dropdown">
                <NavDropdown.Item href="/profile">Profile</NavDropdown.Item>
                <NavDropdown.Item href="/orders">Orders</NavDropdown.Item>
                <NavDropdown.Divider />
                <NavDropdown.Item href="/logout">Logout</NavDropdown.Item>
            </NavDropdown>
        </Nav>
    ) : (
        <Nav>
            <li><Link to="/SignIn" className="nav-link">SignIn</Link></li>
            <Link to="/SignUp" className="nav-link">Register</Link>
        </Nav>
    )}
</Nav>
*/

export default Layout;