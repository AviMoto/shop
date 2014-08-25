<input ng-model="query"/>
<section ng-repeat="category in catgories">  
          <h1>
             {{category.name}}
          </h1>
          <section ng-repeat="product in category.products | array | filter:query">
              <h2>{{product.name}}</h2>
              <div>price: {{product.price}}</div>
          </section>
</section>