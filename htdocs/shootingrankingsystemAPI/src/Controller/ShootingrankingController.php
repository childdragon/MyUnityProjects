<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Shootingranking Controller
 *
 * @property \App\Model\Table\ShootingrankingTable $Shootingranking
 *
 * @method \App\Model\Entity\Shootingranking[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShootingrankingController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $shootingranking = $this->paginate($this->Shootingranking);

        $query	= $this->Shootingranking->find("all");

        $query->order(['Score'=>'DESC']);   //降順
        $query->limit(20);                  //取得件数を20件までに絞る

        $array=$query->toArray();

        $this->set('shootingranking', $array);
    }

    /**
     * View method
     *
     * @param string|null $id Shootingranking id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shootingranking = $this->Shootingranking->get($id, [
            'contain' => []
        ]);

        $this->set('shootingranking', $shootingranking);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shootingranking = $this->Shootingranking->newEntity();
        if ($this->request->is('post')) {
            $shootingranking = $this->Shootingranking->patchEntity($shootingranking, $this->request->getData());
            if ($this->Shootingranking->save($shootingranking)) {
                $this->Flash->success(__('The shootingranking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shootingranking could not be saved. Please, try again.'));
        }
        $this->set(compact('shootingranking'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Shootingranking id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shootingranking = $this->Shootingranking->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shootingranking = $this->Shootingranking->patchEntity($shootingranking, $this->request->getData());
            if ($this->Shootingranking->save($shootingranking)) {
                $this->Flash->success(__('The shootingranking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shootingranking could not be saved. Please, try again.'));
        }
        $this->set(compact('shootingranking'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Shootingranking id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shootingranking = $this->Shootingranking->get($id);
        if ($this->Shootingranking->delete($shootingranking)) {
            $this->Flash->success(__('The shootingranking has been deleted.'));
        } else {
            $this->Flash->error(__('The shootingranking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /*
    リクエストURL
    http://localhost/shootingrankingsystemAPI/shootingranking/getRankings
    リクエストパラメータ
    無し
    レスポンスコード
    ランキングデータリスト
    */
	//ランキングデータリストを取得する。
	public function getRankings()
	{
		$this->autoRender	= false;
		
		//テーブルからランキングリストをとってくる
        $query	= $this->Shootingranking->find("all");

        //クエリー処理を行う。
        $query->order(['Score'=>'DESC']);   //降順
        $query->limit(20);                  //取得件数を20件までに絞る
		
		//jsonにシリアライズする。
		$json	= json_encode($query);

		//jsonデータを返す。（レスポンスとして表示する。）
		echo $json;
    }

    /*
    リクエストURL
    http://localhost/shootingrankingsystemAPI/shootingranking/setRanking
    リクエストパラメータ
    name  varchar
    score int
    レスポンスコード
    0:失敗
    1:成功
    */
    //ランキングデータ単体をセットする。
	public function setRanking()
	{
		$this->autoRender	= false;

        //POST パラメータを取得
        $postName   = $this->request->data["Name"];
        $postScore  = $this->request->data["Score"];

        //テーブルに追加するレコードを作る
        // $record = array(
        //     "name"=>"Nakamura",
        //     "score"=>150,
        // );
        $record = array(
            "Name"=>$postName,
            "Score"=>$postScore,
        );

        //テーブルにレコードを追加
        $prm1    = $this->Shootingranking->newEntity();
        $prm2    = $this->Shootingranking->patchEntity($prm1,$record);
        if( $this->Shootingranking->save($prm2) ){
            echo "1";   //成功
        }else{
            echo "0";   //失敗
        }
	}
}
