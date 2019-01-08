<?php
switch ($type) {
	case 'success':
		$type = 'success';
		break;
	case 'danger':
		$type = 'danger';
		break;
	default:
		case 'light':
		$type = 'light';
		break;
	}
	?>
<div class="alert alert-{{$type}}">
    {{ $slot }}

</div>

