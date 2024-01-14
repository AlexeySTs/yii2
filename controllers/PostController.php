<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Post;
use app\models\ContactForm;
use app\models\PostSearch;
use app\models\PostFrontendSearch;

class PostController extends Controller
{

    public function actionIndex ()
    {

        $searchModel = new PostFrontendSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
     
    }

    public function actionView($id)
	{
        $post = Post::find()->where(['id' => $id])->one();
        
        /*  
        echo '<pre>';
        print_r($post);
        echo '</pre>'; 
        */

        if($post) {
            return $this->render('view', ['model' => $post]);
        }

        throw new \yii\web\NotFoundHttpException('Пост не найден');
    }

    
}