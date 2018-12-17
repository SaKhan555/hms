       @if(count($countries) > 0)
    @foreach ($countries as $country)
    <tr class="table-light">
        <td>
                <li class="dropdown list-unstyled">
                  <a class="dropdown-toggle badge" data-toggle="dropdown" href="#">{{ (strlen($country->country) > 3) ? ucfirst($country->country) : strtoupper($country->country) }}
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#" class="dropdown-item badge btnEdit" data-id='{{ $country->id }}' data-value='{{ $country->country }}' title="Edit"><i class="fa fa-edit"></i> Edit</a></li>
                      <li> <button type="button" class="dropdown-item badge btnDelete" data-id="{{ $country->id }}" title="Delete" style="cursor: pointer;"><i class="fa fa-trash"></i> Delete</button></li>
                    </ul>
                  </li>
        </td>
        <td><span class="badge">{{ $country->user->name }}</span></td>
        <td><span class="badge">{{ $country->created_at->diffForHumans() }}</span></td>
    </tr>

    @endforeach
     @else
    <tr class="table-light">
      <td> <a href="#"><span class="badge" style="color: red;">There is no record.</span></a>
      </td>
    </tr>
    @endif