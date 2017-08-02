
    <table border ="1">
      <thead>
        <tr>
          <th>Category Code</th>
          <th>Category Description</th>

        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="x in CategoryList">
           <td>{{ x.categ_code }}</td>
           <td>{{ x.categ_desc}}</td>
        </tr>
      </tbody>
    </table>

