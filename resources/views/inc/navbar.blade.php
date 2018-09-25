<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Users</a></li>
                <li class="{{ Request::is('transactions') ? 'active' : '' }}"><a href="/transactions">Transactions</a></li>
                <li class="{{ Request::is('create_transaction') ? 'active' : '' }}"><a href="/create_transaction">Create transaction</a></li>
            </ul>
        </div>
    </div>
</nav>