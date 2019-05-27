<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProfileSources Controller
 *
 * @property \App\Model\Table\ProfileSourcesTable $ProfileSources
 *
 * @method \App\Model\Entity\ProfileSource[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfileSourcesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->is('post')) {
            if (!empty($this->request->getData('title'))) {
                $source_name = $this->request->getData('title');
                $limit = 1000;
            } else {
                $source_name = '';
                $limit = 10;
            }
        } else {
            $source_name = '';
            $limit = 10;
        }
        $this->paginate = [
            'conditions' => array(
                'title LIKE' => '%' . $source_name . '%'
            ),
            'limit' => $limit,
            'order' => [
                'title' => 'asc'
            ]
        ];
        $this->set('profileSources', $this->paginate($this->ProfileSources));
        $this->set('_serialize', ['profileSources']);
    }

    /**
     * View method
     *
     * @param string|null $id Profile Source id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profileSource = $this->ProfileSources->get($id, [
            'contain' => []
        ]);

        $this->set('profileSource', $profileSource);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $profileSource = $this->ProfileSources->newEntity();
        if ($this->request->is('post')) {
            $profileSource = $this->ProfileSources->patchEntity($profileSource, $this->request->getData());
            $profileSource['created_by'] = $this->Auth->user('id');
            if ($this->ProfileSources->save($profileSource)) {
                $this->Flash->success(__('The profile source has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profile source could not be saved. Please, try again.'));
        }
        $this->set(compact('profileSource'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Profile Source id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profileSource = $this->ProfileSources->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $profileSource = $this->ProfileSources->patchEntity($profileSource, $this->request->getData());
            $profileSource['modified_by'] = $this->Auth->user('id');
            if ($this->ProfileSources->save($profileSource)) {
                $this->Flash->success(__('The profile source has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profile source could not be saved. Please, try again.'));
        }
        $this->set(compact('profileSource'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Profile Source id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /* public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profileSource = $this->ProfileSources->get($id);
        if ($this->ProfileSources->delete($profileSource)) {
            $this->Flash->success(__('The profile source has been deleted.'));
        } else {
            $this->Flash->error(__('The profile source could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    } */

    public function checkSourceName($id = null) {
        $source_name = $this->request->data['title'];
        if ($id != '') {
            $sourceName = $this->ProfileSources->find('all')->select(['title'])->where(['title' => $source_name, 'NOT' => array('id' => $id)]);
        } else {
            $sourceName = $this->ProfileSources->find('all')->select(['title'])->where(['title' => $source_name]);
        }
        $sourceArr = $sourceName->toArray();
        if (count($sourceArr) > 0) {
            $dataArr['success'] = 'true';
        } else {
            $dataArr['success'] = 'false';
        }
        echo json_encode($dataArr);
        exit;
    }
}
