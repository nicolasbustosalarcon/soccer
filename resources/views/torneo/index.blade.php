
@extends ('layouts.app')

@section ('title', 'Torneos')

@section ('content')
<!DOCTYPE html>
        <!-- Pushwoosh section START -->
  <!-- Pushwoosh section END -->
  
    <meta name="apple-itunes-app" content="app-id=1024506667" />
      <link rel="manifest" href="https://en.competitions.uefa.com/uefachampionsleague/libraries/manifest" />
  <link href="https://css.uefa.com/CompiledAssets/UefaCom/css/competitions/uefachampionsleague/base-uefachampionsleague.css?_t=5e2b27e5843436ef0d244b1d43c6057d" rel="stylesheet" type="text/css" /><link href="https://css.uefa.com/CompiledAssets/UefaCom/css/competitions/uefachampionsleague/sections/hp.css?_t=cebb9f4c47bd6868f98c65d1ce37bd82" rel="stylesheet" type="text/css" /><link href="https://css.uefa.com/CompiledAssets/UefaCom/css/competitions/uefachampionsleague/sections/photos.css?_t=65ccfb81009918350f3d9bf1f79cd4ef" rel="stylesheet" type="text/css" /><link href="https://css.uefa.com/CompiledAssets/UefaCom/css/templates/basic.css?_t=d1411013daae8cbf001c59282d2880c0" rel="stylesheet" type="text/css" />
  <!--[if lt IE 10]>
    <script>document.getElementsByTagName("html")[0].className = "old-ie";</script>
  <![endif]-->
  
    
    <script type="text/javascript">
      var onLoad = function () {
        if (!window.D3 || !window.D3.country) return;

        window.D3.country.get().then(function (country) {
          if (!country.fifaCountryCode) return;
          window.dataLayer.push({
            event: "Page Meta",
            country: country.fifaCountryCode
          });
        });
      };

      var oldonload = window.onload;
      window.onload = (typeof window.onload != "function")
        ? onLoad
        : function () {
          oldonload();
          onLoad();
        };
    </script>
    <!-- Google Optimize -->
    <style>

      .async-hide {
        opacity: 0 !important;
      }
    </style>
    <script>
      (function (a, s, y, n, c, h, i, d, e) {
        s.className += ' ' + y;
        h.start = 1 * new Date;
        h.end = i = function () { s.className = s.className.replace(RegExp(' ?' + y), '') };
        (a[n] = a[n] || []).hide = h;
        setTimeout(function () { i(); h.end = null }, c);
        h.timeout = c;
      })(window, document.documentElement, 'async-hide', 'dataLayer', 4000, { 'GTM-WGBZGNT': true });
    </script>
    <script>
      (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () { (i[r].q = i[r].q || []).push(arguments) },
          i[r].l = 1 * new Date(); a = s.createElement(o),
          m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
      })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
      ga('create', 'UA-99223133-1', 'auto');
      ga('require', 'GTM-WGBZGNT');
    </script>
    <!-- end Google Optimize -->
    <!-- Google Tag Manager -->
    <script>
      (function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' });
        var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s),
          dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
      })(window, document, 'script', 'dataLayer', 'GTM-5NXJMPQ');
    </script>
    <!-- end Google Tag Manager -->
    <script src="https://js.uefa.com/CompiledAssets/UefaCom/js/vendorfiles/vendorfiles.js?_t=5ef2ed610376d86c205eb6f67d529f73" type="text/javascript"></script>
</head>
<body class="langE">
  <!-- Google Tag Manager (noscript) -->
    <noscript>
      <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5NXJMPQ"
              height="0" width="0" style="display: none; visibility: hidden"></iframe>
    </noscript>
  <!-- End Google Tag Manager (noscript) -->
  <!-- Facebook stuff -->
  <div id="fb-root"></div>
<!-- Main wrapper -->
<div class="container-fluid main-wrap">
	<div class="row text-warning">
		<table class="table table-striped text-success">
			<thead>
				<th>Nombre</th>
				<th>Edicion</th>
				<th>Organizador</th>
				<th>Club Campeon</th>
			</thead>
			<tbody>
				@foreach($torneos as $tor)
					@foreach($confederaciones as $conf)
						@if($tor->idConfederacion === $conf->idConfederacion)
						<tr>
							<td>{{ $tor['nombreTorneo'] }}</td>
							<td>{{ $tor['edicion'] }}</td>
							@foreach($confederaciones as $conf)
								@if($tor->idConfederacion === $conf->idConfederacion)
									<td>{{ $conf['nombreConfederacion'] }}</td>		
								@endif
							@endforeach
							
							@if($tor->idClubCampeon === null)
							    <td>Aun no está definido</td>
							@endif
							@foreach($clubes as $club)
								@if($tor->idClubCampeon === $club->idClub)
									<td>{{ $club['nombreClub'] }}</td>
								@endif
							@endforeach	
						</tr>
						@endif
					@endforeach
				@endforeach
			</tbody>
		</table>
	</div>

		<div>
			<div class="row justify-content-center">
			</div>

			<div class="row justify-content-center" style="height:400px"> 
				<ul class="row justify-content-center" role="" style="width: 304px;"> 
					<li class="row justify-content-center"  role="" aria-hidden="" style="width: 200px; height: 90px; margin-right: 0px;"> 
						<a href="torneo" class="row justify-content-center" > 
							<img class="row justify-content-center" width="250" height="229" alt="levantar_copa" src="images/torneos/dab.png"> 
						</a> 
					</li>
				</ul>
			</div>
		</div>
	<iframe width="1100" height="0.1" src="https://www.youtube.com/embed/UbjnIJ4LB30?&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <!-- Header -->
  <header class="row header-wrap">
<script type="text/javascript">
  window.uefaBaseUrl = window.uefaBaseUrl || '//www.uefa.com';
  window.vsmBaseUrl = window.vsmBaseUrl || 'https://en.competitions.uefa.com';
  window.uefaApiBaseUrl = window.uefaApiBaseUrl || 'https://en.competitions.uefa.com/api/v1/';
</script>
  </header>
  <!-- Content wrapper -->
  <div class="body row">
    <div class="content-wrap">
      <!-- Navigation -->
      <div class="navigation">
  <nav class="navbar-iw-lv0" data-offset="60">
    <div class="competition-logo">
      <a class="logolink" title="UEFA Champions League" href="/uefachampionsleague/">UEFA Champions League</a>
    </div>
    <div class="competition-aside">
      <!-- Countdown/wordmark -->
      <div class="competition-info">
      </div>
      <!-- Sponsors -->
    <!-- Logo -->
    <div class="competition-logo">
      <a class="logolink" title="UEFA Champions League" href="/uefachampionsleague/">UEFA Champions League</a>
    </div>
    <div class="competition-aside">
  </body>
</html>
@endsection