<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * JobTypes Controller
 *
 * @property \App\Model\Table\JobTypesTable $JobTypes
 *
 * @method \App\Model\Entity\JobType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JobTypesController extends AppController
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
                $title_name = $this->request->getData('title');
                $limit = 1000;
            } else {
                $title_name = '';
                $limit = 10;
            }
        } else {
            $title_name = '';
            $limit = 10;
        }
        $this->paginate = [
            'conditions' => array(
                'title LIKE' => '%' . $title_name . '%'
            ),
            'limit' => $limit,
            'order' => [
                'title' => 'asc'
            ]
        ];
        $this->set('jobTypes', $this->paginate($this->JobTypes));
        $this->set('_serialize', ['jobTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Job Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobType = $this->JobTypes->get($id, [
            'contain' => []
        ]);

        $this->set('jobType', $jobType);
        $this->set('_serialize', ['jobType']);

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jobType = $this->JobTypes->newEntity();
        if ($this->request->is('post')) {
            $jobType = $this->JobTypes->patchEntity($jobType, $this->request->getData());
            $jobType['created_by'] = $this->Auth->user('id');
            if ($this->JobTypes->save($jobType)) {
                $this->Flash->success(__('The job type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job type could not be saved. Please, try again.'));
        }
        $this->set(compact('jobType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Job Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jobType = $this->JobTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobType = $this->JobTypes->patchEntity($jobType, $this->request->getData());
            $jobType['modified_by'] = $this->Auth->user('id');
            if ($this->JobTypes->save($jobType)) {
                $this->Flash->success(__('The job type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job type could not be saved. Please, try again.'));
        }
        $this->set(compact('jobType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Job Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /* public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobType = $this->JobTypes->get($id);
        if ($this->JobTypes->delete($jobType)) {
            $this->Flash->success(__('The job type has been deleted.'));
        } else {
            $this->Flash->error(__('The job type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    } */

    public function checkJobtype($id = null) {
        $job_type_name = $this->request->getData('title');
        if ($id != '') {
            $jobtypeName = $this->JobTypes->find('all')->select(['title'])->where(['title' => $job_type_name, 'NOT' => array('id' => $id)]);
        } else {
            $jobtypeName = $this->JobTypes->find('all')->select(['title'])->where(['title' => $job_type_name]);
        }
        $jobtypeArr = $jobtypeName->toArray();
        if (count($jobtypeArr) > 0) {
            $dataArr['success'] = 'true';
        } else {
            $dataArr['success'] = 'false';
        }
        echo json_encode($dataArr);
        exit;
    }
}
