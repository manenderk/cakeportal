<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustomFieldTypes Controller
 *
 * @property \App\Model\Table\CustomFieldTypesTable $CustomFieldTypes
 *
 * @method \App\Model\Entity\CustomFieldType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomFieldTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $customFieldTypes = $this->paginate($this->CustomFieldTypes);

        $this->set(compact('customFieldTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Custom Field Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customFieldType = $this->CustomFieldTypes->get($id, [
            'contain' => []
        ]);

        $this->set('customFieldType', $customFieldType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customFieldType = $this->CustomFieldTypes->newEntity();
        if ($this->request->is('post')) {
            $customFieldType = $this->CustomFieldTypes->patchEntity($customFieldType, $this->request->getData());
            if ($this->CustomFieldTypes->save($customFieldType)) {
                $this->Flash->success(__('The custom field type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The custom field type could not be saved. Please, try again.'));
        }
        $this->set(compact('customFieldType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Custom Field Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customFieldType = $this->CustomFieldTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customFieldType = $this->CustomFieldTypes->patchEntity($customFieldType, $this->request->getData());
            if ($this->CustomFieldTypes->save($customFieldType)) {
                $this->Flash->success(__('The custom field type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The custom field type could not be saved. Please, try again.'));
        }
        $this->set(compact('customFieldType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Custom Field Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customFieldType = $this->CustomFieldTypes->get($id);
        if ($this->CustomFieldTypes->delete($customFieldType)) {
            $this->Flash->success(__('The custom field type has been deleted.'));
        } else {
            $this->Flash->error(__('The custom field type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
