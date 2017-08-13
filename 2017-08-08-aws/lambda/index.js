var TASK_QUEUE_URL = process.env.TASK_QUEUE_URL;
var AWS_REGION = process.env.AWS_REGION;

var AWS = require("aws-sdk");
var sqs = new AWS.SQS({region: AWS_REGION});
var dynamoDB = new AWS.DynamoDB.DocumentClient({region: AWS_REGION});

function receiveMessages(callback) {
  var params = {
    QueueUrl: TASK_QUEUE_URL,
    MaxNumberOfMessages: 10
  };
  sqs.receiveMessage(params, function(err, data) {
    if (err) {
      console.error(err, err.stack);
      callback(err);
    } else {
      callback(null, data.Messages);
    }
  });
}

function handleSQSMessages(context, callback) {
  receiveMessages(function(err, messages) {
    if (messages && messages.length > 0) {

      messages.forEach(function(message) {
        const body = JSON.parse(message.Body);
        console.log(body.orderId);

        const params = {
          TableName: 'orders',
          Key: {
            orderId: body.orderId
          },
          UpdateExpression: "set #s = :s",
          ExpressionAttributeNames: {
            "#s": "status",
          },
          ExpressionAttributeValues: {
            ":s": "done"
          },
          ReturnValues:"UPDATED_NEW"
        };
        dynamoDB.update(params, function(err, data) {
          if (err) {
            console.error("Unable to update item. Error JSON:", JSON.stringify(err, null, 2));
          } else {
            console.log("Update succeeded:", JSON.stringify(data, null, 2));
            deleteMessage(message.ReceiptHandle);
          }
        })
      });
    } else {
      callback(null, 'DONE');
    }
  });
}

function deleteMessage(receiptHandle) {
  sqs.deleteMessage({
    ReceiptHandle: receiptHandle,
    QueueUrl: TASK_QUEUE_URL
  }, function(err, data) {
    if (err) console.log(err, err.stack); // an error occurred
    else     console.log(data);
  });
}

exports.handler = (event, context, callback) => {
  handleSQSMessages(context, callback);
};