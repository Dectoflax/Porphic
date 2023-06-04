@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
<img height="60px" width="60px" src="{{ asset('resources/svg/Logo_ring.svg', app()->isProduction()) }}" alt="{{ config('app.name') }}">
</a>
</td>
</tr>
