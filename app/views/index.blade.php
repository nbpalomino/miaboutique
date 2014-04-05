<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Laravel 4 E-Commerce</title>
    <link
      type="text/css"
      rel="stylesheet"
      href="{{ asset("vendor/bootstrap-bower/css/bootstrap.min.css") }}"
    />
    <link
      type="text/css"
      rel="stylesheet"
      href="{{ asset("vendor/bootstrap-bower/css/bootstrap-theme.min.css") }}"
    />
    <link
      type="text/css"
      rel="stylesheet"
      href="{{ asset("vendor/shared.css") }}"
    />
    <script
      type="text/javascript"
      src="{{ asset("vendor/angular/angular.min.js") }}"
    ></script>
    <script
      type="text/javascript"
      src="{{ asset("vendor/angular-cookies/angular-cookies.min.js") }}"
    ></script>
  </head>
  <body ng-app="app">
    <div class="container" ng-controller="main">
      <div class="row">
        <div class="col-md-12">
          <h1>
            Laravel 4 E-Commerce
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8" ng-controller="products">
          <h2>
            Products
          </h2>
          <div class="categories btn-group">
            <button
              type="button"
              class="category btn btn-success active"
              ng-click="products.setCategory(null)"
              ng-class="{ 'active' : products.category == null }"
            >
              All
            </button>
            <button
              type="button"
              class="category btn btn-success"
              ng-repeat="category in products.categories"
              ng-click="products.setCategory(category)"
              ng-class="{ 'active': products.category.id == category.id }"
            >
              @{{ category.name }}
            </button>
          </div>
          <div class="products">
            <div class="product media"
            	ng-repeat="product in products.products | filter: products.filterByCategory">
              <button
                type="button"
                class="pull-left btn btn-default"
                ng-click="products.addToBasket(product)"
              >
                Add to basket
              </button>
              <div class="media-body">
                <h4 class="media-heading">@{{ product.name }}</h4>
                <p>
                  Price: @{{ product.price }}, Stock: @{{ product.stock }}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4" ng-controller="basket">
          <h2>
            Basket
          </h2>
          <form class="basket">
            <table class="table">
              <tr class="product"
               	ng-repeat="product in basket.products track by $index"
                ng-class="{ 'hide':basket.state !== 'shopping' }">
                <td class="name">
                   @{{ product.name }}
                </td>
                <td class="quantity">
                  <input
                    class="quantity form-control col-md-3"
                    type="number"
                    ng-model="product.quantity"
                    ng-change="basket.update()"
                    min="1"
                  />
                </td>
                <td class="product">
                  @{{ product.total }}
                </td>
                <td class="product">
                  <a
                    class="remove glyphicon glyphicon-remove"
                    ng-click="basket.remove(product)"
                  ></a>
                </td>
              </tr>
              <tr>
        <td
          colspan="4"
          ng-class="{ 'hide' : basket.state != 'shopping' }"
        >
          <input
            type="text"
            class="form-control"
            placeholder="email"
            ng-model="basket.email"
          />
        </td>
      </tr>
      <tr>
        <td
          colspan="4"
          ng-class="{ 'hide' : basket.state != 'shopping' }"
        >
          <input
            type="password"
            class="form-control"
            placeholder="password"
            ng-model="basket.password"
          />
        </td>
      </tr>
      <tr>
        <td
          colspan="2"
          ng-class="{ 'hide' : basket.state != 'shopping' }"
        >
          <button
            type="button"
            class="pull-left btn btn-primary"
            ng-click="basket.authenticate()"
          >
            Authenticate
          </button>
        </td>
        <td colspan="2"
          ng-class="{ 'hide': basket.state != 'shopping' }">
          <span class="label label-danger">Error</span>
        </td>
      </tr>
      <tr>
        <td
          colspan="4"
          ng-class="{ 'hide' : basket.state != 'paying' }"
        >
          <input
            type="text"
            class="form-control"
            placeholder="card number"
            ng-model="basket.number"
          />
        </td>
      </tr>
      <tr>
        <td
          colspan="4"
          ng-class="{ 'hide' : basket.state != 'paying' }"
        >
          <input
            type="text"
            class="form-control"
            placeholder="expiry"
            ng-model="basket.expiry"
          />
        </td>
      </tr>
      <tr>
        <td
          colspan="4"
          ng-class="{ 'hide' : basket.state != 'paying' }"
        >
          <input
            type="text"
            class="form-control"
            placeholder="security number"
            ng-model="basket.security"
          />
        </td>
      </tr>
      <tr>
        <td
          colspan="4"
          ng-class="{ 'hide' : basket.state != 'paying' }"
        >
          <button
            type="button"
            class="pull-left btn btn-default"
            ng-click="basket.pay()"
          >
            Pay
          </button>
        </td>
      </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
    <script
      type="text/javascript"
      src="{{ asset("vendor/shared.js") }}"
    ></script>
  </body>
</html>