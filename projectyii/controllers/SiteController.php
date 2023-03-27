<?php

namespace app\controllers;

use RestClient;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use PhpParser\Node\Expr\Assign;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $auth = Yii::$app->authManager;
        $admin = $auth->createRole('administrador');
        $supervisor = $auth->createRole('supervisor');
        $operador = $auth->createRole('operador');

        $auth->Add($admin);
        $auth->Add($supervisor);        
        $auth->Add($operador);

        $viewPost = $auth->createPermission('post-index');
        $addPost = $auth->createPermission('post-create');
        $editPost = $auth->createPermission('post-edit');
        $deletePost = $auth->createPermission('post-delete');

        $auth->add($viewPost);
        $auth->add($addPost);
        $auth->add($editPost);
        $auth->add($deletePost);

        $auth->addChild($admin, $viewPost);
        $auth->addChild($admin, $addPost);
        $auth->addChild($admin, $editPost);
        $auth->addChild($admin, $deletePost);

        $auth->addChild($supervisor, $addPost);
        $auth->addChild($supervisor, $editPost);
        $auth->addChild($supervisor, $viewPost);

        $auth->addChild($operador, $viewPost);

        $auth->assign($admin, 1);
        $auth->assign($supervisor, 2);
        $auth->assign($operador, 3);

        return $this->render('index', [
            'nome' => 'Michelly',
            'sobrenome' => 'Narita'
        ]);
    }

    public function actionTestPermission($userId)
    {
        $auth = Yii::$app->authManager;

        echo "<p> View Post: {$auth->checkAccess($userId, 'post-index')} </p>";
        echo "<p> Create Post: {$auth->checkAccess($userId, 'post-create')} </p>";
        echo "<p> Edit Post: {$auth->checkAccess($userId, 'post-edit')} </p>";
        echo "<p> Delete Post: {$auth->checkAccess($userId, 'post-delete')} </p>";


    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionFeed()
    {
        $api = new RestClient([
            'base_url' => 'http://localhost/curso-GER-2987/projectyii/web/index.php/api',
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);


        $api->post('default/create', [
            'titulo' => 'Criando noticia pela aplicação',
            'cabeca' => 'titulo inicial da noticia',
            'corpo' => 'corpo da noticia skaskaopoaskpoakspo',
            'status' => 1,
        ]);

        $api->put('default/7', [
            'titulo' => 'titulo alterado'
        ]);

        $api->delete('default/7');

        $result = $api->get('/default');
        $data = Yii\helpers\Json::decode($result->response);

        return $this->render('feed', [
            'data' => $data
        ]);
    }
}
