<?php
$app->get('/mining-titles-exchange', function() use($app, $settings) {
    $id = 1;
    if ($post = Posts::find($id)) {
        $flash = $app->view()->getData('flash');
        $error = isset($flash['error']) ? $flash['error'] : '';

        $post->author = Users::get_author($post->user_id);
        $post->date = date('d-m-Y H:i', $post->creation);
        $post->text = $app->markdown->parse($post->text);
        $post->count = Posts::find($post->id)->comments->count();

        $comments = Posts::find($post->id)->comments;

        $redirect = $app->request->getUrl() . $app->request->getPath();

        $app->render('miningTitleExchange.html', array('post' => $post, 'error' => $error, 'comments' => $comments, 'redirect' => $redirect));
    }
    else {
        $app->render('404_post.html');
    }
})->conditions(array('page' => '\d+'));

$app->get('/contact', function() use($app, $settings) {
    $id = 1;
    if ($post = Posts::find($id)) {
        $flash = $app->view()->getData('flash');
        $error = isset($flash['error']) ? $flash['error'] : '';

        $post->author = Users::get_author($post->user_id);
        $post->date = date('d-m-Y H:i', $post->creation);
        $post->text = $app->markdown->parse($post->text);
        $post->count = Posts::find($post->id)->comments->count();

        $comments = Posts::find($post->id)->comments;

        $redirect = $app->request->getUrl() . $app->request->getPath();

        $app->render('contact.html', array('post' => $post, 'error' => $error, 'comments' => $comments, 'redirect' => $redirect));
    }
    else {
        $app->render('404_post.html');
    }
})->conditions(array('page' => '\d+'));

$app->get('/creercompte', function() use($app, $settings) {
    $id = 1;
    if ($post = Posts::find($id)) {
        $flash = $app->view()->getData('flash');
        $error = isset($flash['error']) ? $flash['error'] : '';

        $post->author = Users::get_author($post->user_id);
        $post->date = date('d-m-Y H:i', $post->creation);
        $post->text = $app->markdown->parse($post->text);
        $post->count = Posts::find($post->id)->comments->count();

        $comments = Posts::find($post->id)->comments;

        $redirect = $app->request->getUrl() . $app->request->getPath();

        $app->render('creercompte.html', array('post' => $post, 'error' => $error, 'comments' => $comments, 'redirect' => $redirect));
    }
    else {
        $app->render('404_post.html');
    }
})->conditions(array('page' => '\d+'));

$app->get('/creercompte_buy', function() use($app, $settings) {
    $id = 1;
    if ($post = Posts::find($id)) {
        $flash = $app->view()->getData('flash');
        $error = isset($flash['error']) ? $flash['error'] : '';

        $post->author = Users::get_author($post->user_id);
        $post->date = date('d-m-Y H:i', $post->creation);
        $post->text = $app->markdown->parse($post->text);
        $post->count = Posts::find($post->id)->comments->count();

        $comments = Posts::find($post->id)->comments;

        $redirect = $app->request->getUrl() . $app->request->getPath();

        $app->render('creercompte_buy.html', array('post' => $post, 'error' => $error, 'comments' => $comments, 'redirect' => $redirect));
    }
    else {
        $app->render('404_post.html');
    }
})->conditions(array('page' => '\d+'));

$app->get('/creerarticle', function() use($app, $settings) {
    $id = 1;
    if ($post = Posts::find($id)) {
        $flash = $app->view()->getData('flash');
        $error = isset($flash['error']) ? $flash['error'] : '';

        $post->author = Users::get_author($post->user_id);
        $post->date = date('d-m-Y H:i', $post->creation);
        $post->text = $app->markdown->parse($post->text);
        $post->count = Posts::find($post->id)->comments->count();

        $comments = Posts::find($post->id)->comments;

        $redirect = $app->request->getUrl() . $app->request->getPath();
		$region = Region::get_region();
		$type = Type::get_type();
		$departement = Departement::get_departement();
		$basin = Basin::get_basin();

        $app->render('creerarticle.html', array('post' => $post, 'error' => $error, 'Departement' => $departement, 'Region' => $region, 'Type' => $type, 'Basin' => $basin, 'comments' => $comments, 'redirect' => $redirect));
    }
    else {
        $app->render('404_post.html');
    }
})->conditions(array('page' => '\d+'));

$app->get('/listing', function() use($app, $settings) {
	
		/* Candidate::where('user_id',$user_id)
                ->update(['active' => 0]); Users::get_id($user); */
    $id = 1;
    if ($post = Posts::find($id)) {
        $flash = $app->view()->getData('flash');
        $error = isset($flash['error']) ? $flash['error'] : '';

        $post->author = Users::get_author($post->user_id);
        $post->date = date('d-m-Y H:i', $post->creation);
        $post->text = $app->markdown->parse($post->text);
        $post->count = Posts::find($post->id)->comments->count();

        $comments = Posts::find($post->id)->comments;

        $redirect = $app->request->getUrl() . $app->request->getPath();
				$id=$_SESSION['user_id'];
		$listarticles = Articles::get_article($id);// Articles::where('id_user','=', $id);
		
		$i=0;
		foreach ($listarticles as $value) {
		$listarticles[$i][0] = Articles_Users::get_user_id($value->id_article);
		foreach ($listarticles[$i][0] as &$val) {
			if(isset($val->id_user)){
				
			$val[0] = Users::get_name($val->id_user);
			}
			else{
			}
		}
		unset($val);
		$i++;
		}
		unset($value); // Détruit la référence sur le dernier élément
		//var_dump($listarticles);
        $app->render('bordlisting.html',  array('post' => $post, 'error' => $error, 'comments' => $listarticles, 'redirect' => $redirect));
    }
    else {
        $app->render('404_post.html');
    }
})->conditions(array('page' => '\d+'));

$app->get('/offers', function() use($app, $settings) {
    $id = 1;
    if ($post = Posts::find($id)) {
        $flash = $app->view()->getData('flash');
        $error = isset($flash['error']) ? $flash['error'] : '';

        $post->author = Users::get_author($post->user_id);
        $post->date = date('d-m-Y H:i', $post->creation);
        $post->text = $app->markdown->parse($post->text);
        $post->count = Posts::find($post->id)->comments->count();

        $comments = Posts::find($post->id)->comments;

        $redirect = $app->request->getUrl() . $app->request->getPath();

        $app->render('bordoffers.html', array('post' => $post, 'error' => $error, 'comments' => $comments, 'redirect' => $redirect));
    }
    else {
        $app->render('404_post.html');
    }
})->conditions(array('page' => '\d+'));

$app->get('/consultation', function() use($app, $settings) {
    $id = 1;
    if ($post = Posts::find($id)) {
        $flash = $app->view()->getData('flash');
        $error = isset($flash['error']) ? $flash['error'] : '';

        $post->author = Users::get_author($post->user_id);
        $post->date = date('d-m-Y H:i', $post->creation);
        $post->text = $app->markdown->parse($post->text);
        $post->count = Posts::find($post->id)->comments->count();

        $comments = Posts::find($post->id)->comments;

        $redirect = $app->request->getUrl() . $app->request->getPath();

        $app->render('bordconsultation.html', array('post' => $post, 'error' => $error, 'comments' => $comments, 'redirect' => $redirect));
    }
    else {
        $app->render('404_post.html');
    }
})->conditions(array('page' => '\d+'));

$app->post('/faire_offre', function() use($app, $settings) {
	if(isset($_SESSION['user_id'])){
		$id = $_SESSION['user_id'];
		$idarticle = $app->request->post('idarticle');
		$offre = $app->request->post('offre');
		
		Articles_Users::insert(array('id_user' => $id, 'id_article' => $idarticle, 'montant' => $offre));
	}
	
	$app->redirect($settings->base_url . '/listing');
	
	
})->conditions(array('page' => '\d+'));

$app->get('/careers', function() use($app, $settings) {
	
        $app->render('careers.html', array());	
		
})->conditions(array('page' => '\d+'));

$app->get('/employers', function() use($app, $settings) {
	
        $app->render('employers.html', array());	
		
})->conditions(array('page' => '\d+'));

$app->get('/dictionary', function() use($app, $settings) {
	
        $app->render('dictionary.html', array());	
		
})->conditions(array('page' => '\d+'));

$app->get('/economy', function() use($app, $settings) {
	
        $app->render('economy.html', array());	
		
})->conditions(array('page' => '\d+'));

$app->get('/maps', function() use($app, $settings) {
	
        $app->render('maps.html', array());	
		
})->conditions(array('page' => '\d+'));

$app->get('/licence', function() use($app, $settings) {
	
        $app->render('licence.html', array());	
		
})->conditions(array('page' => '\d+'));

$app->get('/project_profile', function() use($app, $settings) {
	
        $app->render('project_profile.html', array());	
		
})->conditions(array('page' => '\d+'));

$app->get('/investment', function() use($app, $settings) {
	
        $app->render('investment.html', array());	
		
})->conditions(array('page' => '\d+'));

$app->get('/business', function() use($app, $settings) {
	
        $app->render('business.html', array());	
		
})->conditions(array('page' => '\d+'));

$app->post('/creercomptes', function() use($app, $settings) {
	//$app->render('contact.html', array('post' => $post, 'error' => $error, 'comments' => $comments, 'redirect' => $redirect));
	
    $username = $app->request->post('name');
        //$password = hash('sha512', $app->request->post('password'));
		$password1 =  $app->request->post('password1');
		$password2 =  $app->request->post('password2');
		$address =  $app->request->post('address');
		$num     = 	$app->request->post('telephone');
		
        $email = $app->request->post('email');
        $created_at = date('Y-m-d H:i:s');

        if($username == "") {
            $app->flash('error', 1);
            $app->redirect($settings->base_url . '/creercompte', array('user' => 'utilisateur'));
        }
        if($password1 == "" || $password2=="") {
            $app->flash('error', 'les mots de passe ne peuvent etre vides');
            $app->redirect($settings->base_url . '/creercompte');
        }
		if($password1 !== $password2){
			$app->flash('error', 'les mots de passe sont differents');
            $app->redirect($settings->base_url . '/creercompte');
		}
        if($email == "" OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $app->flash('error', 4);
            $app->redirect($settings->base_url . '/creercompte');
        }
		
		$password1 = hash('sha512', $password1);
		
        $redirect = $settings->base_url;// . '/home'

        Users::insert(array('username' => $username, 'password' => $password1, 'telephone' => $num, 'email' => $email,'address' => $address, 'created_at' => $created_at));
        $app->render('creerarticle.html', array('redirect' => $redirect));
})->conditions(array('page' => '\d+'));


$app->post('/creercomptes_buy', function() use($app, $settings) {
	//$app->render('contact.html', array('post' => $post, 'error' => $error, 'comments' => $comments, 'redirect' => $redirect));
	
    $username = $app->request->post('name');
        //$password = hash('sha512', $app->request->post('password'));
		$password1 =  $app->request->post('password1');
		$password2 =  $app->request->post('password2');
		$address =  $app->request->post('address');
		$num     = 	$app->request->post('telephone');
		
        $email = $app->request->post('email');
        $created_at = date('Y-m-d H:i:s');

        if($username == "") {
            $app->flash('error', 1);
            $app->redirect($settings->base_url . '/creercompte', array('user' => 'utilisateur'));
        }
        if($password1 == "" || $password2=="") {
            $app->flash('error', 'les mots de passe ne peuvent etre vides');
            $app->redirect($settings->base_url . '/creercompte');
        }
		if($password1 !== $password2){
			$app->flash('error', 'les mots de passe sont differents');
            $app->redirect($settings->base_url . '/creercompte');
		}
        if($email == "" OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $app->flash('error', 4);
            $app->redirect($settings->base_url . '/creercompte');
        }
		
		$password1 = hash('sha512', $password1);
		
        $redirect = $settings->base_url;// . '/home'

        Users::insert(array('username' => $username, 'password' => $password1, 'telephone' => $num, 'email' => $email,'address' => $address, 'created_at' => $created_at));
        $app->render('careerseducation.html', array('redirect' => $redirect));
})->conditions(array('page' => '\d+'));

$app->post('/article', function() use($app, $settings) {
	//$app->render('contact.html', array('post' => $post, 'error' => $error, 'comments' => $comments, 'redirect' => $redirect));
		$id_user=$_SESSION['user_id'];
		$name = $app->request->post('name');
		$basin = $app->request->post('basin');
		$netacre = $app->request->post('netacre');
		$netflow = $app->request->post('netflow');
		$location = $app->request->post('location');
		$prixinit = $app->request->post('prixinit');
		$prixvise = $app->request->post('prixvise');
		$type = $app->request->post('type');
		$region = $app->request->post('region');
		$departement = $app->request->post('departement');
		$descr = $app->request->post('descr');
		$mineral = $app->request->post('mineral');
		$agreement = $app->request->post('agreement');
		$other = $app->request->post('other');
		
        $created_at = date('Y-m-d H:i:s');
		  $redirect = $settings->base_url . '/listing';// 

        Articles::insert(array('id_user' => $id_user, 'nom' => $name, 'basin' => $basin, 'acre' => $netacre,'flow' => $netflow,'location' => $location,'prix_init' => $prixinit,'prix_vise' => $prixvise,
		'type' => $type,'region' => $region,'departement' => $departement,'description' => $descr,'mineral' => $mineral,'agreement' => $agreement,'other' => $other, 'created_at' => $created_at));
        $app->render('bordlisting.html', array('redirect' => $redirect));
})->conditions(array('page' => '\d+'));

$app->get('/careerseducation', function() use($app, $settings) {
    $id = 1;
    if ($post = Posts::find($id)) {

       $flash = $app->view()->getData('flash');
        $error = isset($flash['error']) ? $flash['error'] : '';

        $post->author = Users::get_author($post->user_id);
        $post->date = date('d-m-Y H:i', $post->creation);
        $post->text = $app->markdown->parse($post->text);
        $post->count = Posts::find($post->id)->comments->count();

        $comments = Posts::find($post->id)->comments;
		$articles = Articles::all();
		foreach ($articles as &$val) {
				//var_dump($val->type);
				
			$val->type = Type::get_name($val->type);
			$val->region = Region::get_name($val->region);
			$val->departement = Departement::get_name($val->departement);
			$val->basin = Basin::get_name($val->basin);
		}
		unset($val);
		
		$test=false;
		if(isset($_SESSION['user'])){$test=true;}

        $redirect = $app->request->getUrl() . $app->request->getPath();
        $app->render('careerseducation.html', array('post' => $post, 'test' => $test, 'error' => $error, 'comments' => $comments, 'articles' => $articles, 'redirect' => $redirect));
    }
    else {
        $app->render('404_post.html');
    }
})->conditions(array('page' => '\d+'));

$app->get('/economybench', function() use($app, $settings) {
    $id = 1;
    if ($post = Posts::find($id)) {

       $flash = $app->view()->getData('flash');
        $error = isset($flash['error']) ? $flash['error'] : '';

        $post->author = Users::get_author($post->user_id);
        $post->date = date('d-m-Y H:i', $post->creation);
        $post->text = $app->markdown->parse($post->text);
        $post->count = Posts::find($post->id)->comments->count();

        $comments = Posts::find($post->id)->comments;

        $redirect = $app->request->getUrl() . $app->request->getPath();
        $app->render('economybench.html', array('post' => $post, 'error' => $error, 'comments' => $comments, 'redirect' => $redirect));
    }
    else {
        $app->render('404_post.html');
    }
})->conditions(array('page' => '\d+'));

$app->get('/projectinvestment', function() use($app, $settings) {
    $id = 1;
    if ($post = Posts::find($id)) {

       $flash = $app->view()->getData('flash');
        $error = isset($flash['error']) ? $flash['error'] : '';

        $post->author = Users::get_author($post->user_id);
        $post->date = date('d-m-Y H:i', $post->creation);
        $post->text = $app->markdown->parse($post->text);
        $post->count = Posts::find($post->id)->comments->count();

        $comments = Posts::find($post->id)->comments;

        $redirect = $app->request->getUrl() . $app->request->getPath();
        $app->render('projectinvestment.html', array('post' => $post, 'error' => $error, 'comments' => $comments, 'redirect' => $redirect));
    }
    else {
        $app->render('404_post.html');
    }
})->conditions(array('page' => '\d+'));

$app->get('/mineralexploration', function() use($app, $settings) {
    $id = 1;
    if ($post = Posts::find($id)) {

       $flash = $app->view()->getData('flash');
        $error = isset($flash['error']) ? $flash['error'] : '';

        $post->author = Users::get_author($post->user_id);
        $post->date = date('d-m-Y H:i', $post->creation);
        $post->text = $app->markdown->parse($post->text);
        $post->count = Posts::find($post->id)->comments->count();

        $comments = Posts::find($post->id)->comments;

        $redirect = $app->request->getUrl() . $app->request->getPath();
        $app->render('mineralexploration.html', array('post' => $post, 'error' => $error, 'comments' => $comments, 'redirect' => $redirect));
    }
    else {
        $app->render('404_post.html');
    }
})->conditions(array('page' => '\d+'));

$app->get('/mineraldatabase', function() use($app, $settings) {
    $id = 1;
    if ($post = Posts::find($id)) {

       $flash = $app->view()->getData('flash');
        $error = isset($flash['error']) ? $flash['error'] : '';

        $post->author = Users::get_author($post->user_id);
        $post->date = date('d-m-Y H:i', $post->creation);
        $post->text = $app->markdown->parse($post->text);
        $post->count = Posts::find($post->id)->comments->count();

        $comments = Posts::find($post->id)->comments;

        $redirect = $app->request->getUrl() . $app->request->getPath();
        $app->render('mineraldatabase.html', array('post' => $post, 'error' => $error, 'comments' => $comments, 'redirect' => $redirect));
    }
    else {
        $app->render('404_post.html');
    }
})->conditions(array('page' => '\d+'));

$app->get('/mineralinsigths', function() use($app, $settings) {
    $id = 1;
    if ($post = Posts::find($id)) {

        $flash = $app->view()->getData('flash');
        $error = isset($flash['error']) ? $flash['error'] : '';

        $post->author = Users::get_author($post->user_id);
        $post->date = date('d-m-Y H:i', $post->creation);
        $post->text = $app->markdown->parse($post->text);
        $post->count = Posts::find($post->id)->comments->count();

        $comments = Posts::find($post->id)->comments;

        $redirect = $app->request->getUrl() . $app->request->getPath();

        $app->render('mineralinsigths.html', array('post' => $post, 'error' => $error, 'comments' => $comments, 'redirect' => $redirect));
    }
    else {
        $app->render('404_post.html');
    }
})->conditions(array('page' => '\d+'));

$app->get('/post/:id', function($id) use ($app) {
    if ($post = Posts::find($id)) {
        $flash = $app->view()->getData('flash');
        $error = isset($flash['error']) ? $flash['error'] : '';

        $post->author = Users::get_author($post->user_id);
        $post->date = date('d-m-Y H:i', $post->creation);
        $post->text = $app->markdown->parse($post->text);
        $post->count = Posts::find($post->id)->comments->count();

        $comments = Posts::find($post->id)->comments;

        $redirect = $app->request->getUrl() . $app->request->getPath();

        $app->render('post.html', array('post' => $post, 'error' => $error, 'comments' => $comments, 'redirect' => $redirect));
    }
    else {
        $app->render('404_post.html');
    }
})->conditions(array('page' => '\d+'));

$app->post('/post/comment/new', function() use($app, $settings) {
    $username = $app->request->post('username');
    $url = filter_var($app->request->post('url'), FILTER_SANITIZE_URL);
    $email = $app->request->post('email');
    $text = filter_var($app->request->post('text'), FILTER_SANITIZE_STRING);
    $post_id = $app->request->post('post_id');
    $redirect = $app->request->post('redirect');

    if($username == "") {
        $app->flash('error', 1);
        $app->redirect($settings->base_url . '/post/' . $post_id);
    }
    if($url == "") {
        $app->flash('error', 2);
        $app->redirect($settings->base_url . '/post/' . $post_id);
    }
    if($email == "" OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $app->flash('error', 3);
        $app->redirect($settings->base_url . '/post/' . $post_id);
    }
    if($text == "") {
        $app->flash('error', 4);
        $app->redirect($settings->base_url . '/post/' . $post_id);
    }

    Comments::insert(array('username' => $username, 'url' => $url, 'email' => $email, 'text' => $text, 'posts_id' => $post_id));
    $app->render('success.html', array('redirect' => $redirect));
});