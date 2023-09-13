<?php

namespace backend\controllers;

use backend\models\Emails;
use backend\models\EmailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use yii\web\UpLoadedFile;
use yii\swiftmailer\Mailer;

 /* EmailsController implements the CRUD actions for Emails model.
 */
class EmailsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Emails models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EmailsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Emails model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Emails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Emails();
        if($model->load(Yii::$app->request->post()))
        {
            //upload the attachment
            $model->attachment=UploadedFile::getInstance($model,'attachment');
            if($model->attachment)
            {
                $time=time();
                $model->attachment->saveAs('attachments/'.$time.'.'.$model->attachment->extension);
                $model->attachment='attachments/'.$time.'.'.$model->attachment->extension;

            }
            if($model->attachment){
                $value=yii::$app->mailer->compose()
                ->setFrom([$company->company_email=>company->company_name ])
                ->setTo($model->reciever_email)
                ->setSubject($model->subject)
                ->setHtmlBody($model->content)
                ->attach($model->attachment)
                ->send();

            }
            else
            {
                $value=yii::$app->mailer->compose()
                ->setFrom([$company->company_email=>company->company_name ])
                ->setTo($model->reciever_email)
                ->setSubject($model->subject)
                ->setHtmlBody($model->content) 
                ->send();

            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
       
    
                //$model->save();
               // return $this->redirect(['view', 'id' => $model->id]);
            

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Emails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Emails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Emails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Emails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Emails::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
